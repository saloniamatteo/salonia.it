@use('App\Helpers\Url')
@include('static/head', [
    "lang"  => app()->getLocale(),
    "title" => __("writeups.unbound.title"),
    "desc"  => __("writeups.unbound.desc"),
	"highlight" => 1,
])

<body>
@include('static/header')

<!-- Unbound -->
<x-hero class="mt-4" id="unbound" img="writeups/unbound.webp" alt="{{ __('writeups.unbound.title') }}">
	<x-slot:title>
		{{ __("writeups.unbound.title") }}
	</x-slot>

	<x-slot:desc>
		{{ __("writeups.unbound.desc") }}
	</x-slot>

	<!-- Go to -->
	<p>
		{{ __("glob.go-to") }}:

		<br>

		<!-- DNS -->
		<x-tag-xs href="dns">
			DNS
		</x-tag-xs>

		&nbsp;

		<!-- DoH -->
		<x-tag-xs href="doh">
			DoH
		</x-tag-xs>
	</p>

	<!-- DNS -->
	<x-card class="m-3">
		<x-tag-xl id="dns">DNS</x-tag-xl>

		<p class="my-0">
			{!! __("writeups.unbound.dns.desc") !!}
		</p>

		<!-- Step 1 -->
		<x-tag-md id="dns-s1">{{ __("writeups.unbound.dns.s1.title") }}</x-tag-md>

		<ul class="mt-0">
			<li>
				CentOS/Fedora/RHEL:&nbsp;

				<x-code lang="Bash">
sudo dnf install unbound bind-utils
				</x-code>
			</li>

			<li>
				Debian:&nbsp;

				<x-code lang="Bash">
sudo apt install unbound unbound-anchor bind9-dnsutils
				</x-code>
			</li>

			<li>
				Gentoo:&nbsp;

				<x-code lang="Bash">
sudo emerge unbound bind-utils
				</x-code>
			</li>
		</ul>

		<!-- Step 2 -->
		<x-tag-md id="dns-s2">{{ __("writeups.unbound.dns.s2.title") }}</x-tag-md>

		<p class="mt-0">
			{!! __('writeups.unbound.dns.s2.desc', [
				'file' => '<code>/etc/resolv.conf</code>',
			]) !!}
		</p>

		<x-code lang="resolv.conf">
nameserver 1.1.1.1
nameserver 1.0.0.1
nameserver 2606:4700:4700::1111
nameserver 2606:4700:4700::1001
		</x-code>

		<p>
			{{ __('writeups.unbound.dns.s2.desc2') }}
		</p>

		<!-- Step 3 -->
		<x-tag-md id="dns-s3">{{ __("writeups.unbound.dns.s3.title") }}</x-tag-md>

		<p class="mt-0">
			{!! __('writeups.unbound.dns.s3.desc', [
				'file' => '<code>/etc/unbound/unbound.conf</code>',
			]) !!}
		</p>

		<x-code lang="plain">
# https://nlnetlabs.nl/documentation/unbound/unbound.conf/
server:
	# Do not daemonize, to allow proper systemd service control and status estimation.
	do-daemonize: no
	use-systemd: yes

	# A single thread is pretty sufficient for home or small office instances.
	num-threads: 2

	# Logging: For the sake of privacy and performance, keep logging at a minimum!
	# - Verbosity 2 and up practically contains query and reply logs.
	verbosity: 0
	log-queries: no
	log-replies: no
	log-servfail: yes
	# - If required, uncomment to log to a file, else logs are available via "journalctl -u unbound".
	#logfile: "/var/log/unbound.log"

	# Set interface to "0.0.0.0" to make Unbound listen on all network interfaces.
	# Set it to "127.0.0.1" to listen on requests from the same machine only
	# "::1" is the IPv6 loopback address (same as "127.0.0.1")
	interface: 127.0.0.1
	interface: ::1

	# Default DNS port is "53"
	port: 53

	# Control IP ranges which should be able to use this Unbound instance.
	access-control: 0.0.0.0/0 refuse
	#access-control: 10.0.0.0/8 allow
	access-control: 127.0.0.1/8 allow
	#access-control: 172.16.0.0/12 allow
	#access-control: 192.168.0.0/16 allow
	#access-control: 192.168.1.0/24 allow
	access-control: ::/0 refuse
	access-control: ::1/128 allow
	#access-control: fd00::/8 allow
	#access-control: fe80::/10 allow

	# Private IP ranges, which shall never be returned or forwarded as public DNS response.
	# NB: 127.0.0.1/8 is sometimes used by adblock lists, hence DietPi by default allows those as response.
	private-address: 10.0.0.0/8
	private-address: 172.16.0.0/12
	private-address: 192.168.0.0/16
	private-address: 169.254.0.0/16
	private-address: fd00::/8
	private-address: fe80::/10

	# Define protocols for connections to and from Unbound.
	# NB: Disabling IPv6 does not disable IPv6 IP resolving, which depends on the clients request.
	do-udp: yes
	do-tcp: yes
	do-ip4: yes
	do-ip6: yes

	# deny Unbound the use this of port number or port range for
	# making outgoing queries, using an outgoing interface.
	# Use this to make sure Unbound does not grab a UDP port that some
	# other server on this computer needs. The default is to avoid
	# IANA-assigned port numbers.
	# If multiple outgoing-port-permit and outgoing-port-avoid options
	# are present, they are processed in order.
	outgoing-port-avoid: "3200-3208"

	# DNS root server information file.
	root-hints: "/etc/unbound/root.hints"

	# Maximum number of queries per second
	ratelimit: 100

	# Defend against and print warning when reaching unwanted reply limit.
	unwanted-reply-threshold: 10000

	# Set EDNS reassembly buffer size to match new upstream default, as of DNS Flag Day 2020 recommendation.
	edns-buffer-size: 1232

	# Increase incoming and outgoing query buffer size to cover traffic peaks.
	so-rcvbuf: 4m
	so-sndbuf: 4m

	# Hardening
	harden-glue: yes
	harden-dnssec-stripped: yes
	harden-algo-downgrade: yes
	harden-large-queries: yes
	harden-short-bufsize: yes

	# Privacy
	use-caps-for-id: no # Spoof protection by randomising capitalisation
	rrset-roundrobin: yes
	qname-minimisation: yes
	minimal-responses: yes
	hide-identity: yes
	identity: "Server" # Purposefully a dummy identity name
	hide-version: yes

	# Caching
	cache-min-ttl: 300
	cache-max-ttl: 86400
	serve-expired: no
	neg-cache-size: 4M
	prefetch: yes
	prefetch-key: yes
	msg-cache-size: 50m
	rrset-cache-size: 100m

	# File with trusted keys, kept uptodate using RFC5011 probes,
	# initial file like trust-anchor-file, then it stores metadata.
	# Use several entries, one per domain name, to track multiple zones.
	#
	# If you want to perform DNSSEC validation, run unbound-anchor before
	# you start Unbound (i.e. in the system boot scripts).
	# And then enable the auto-trust-anchor-file config item.
	# Please note usage of unbound-anchor root anchor is at your own risk
	# and under the terms of our LICENSE (see that file in the source).
	auto-trust-anchor-file: "/etc/unbound/root.keys"

	# trust anchor signaling sends a RFC8145 key tag query after priming.
	trust-anchor-signaling: yes

	# Root key trust anchor sentinel (draft-ietf-dnsop-kskroll-sentinel)
	root-key-sentinel: yes

	# DoH
	#interface: 127.0.0.1@4443
	#interface: ::1@4443
	#https-port: 4443
	#http-endpoint: "/dns-query"
	#http-notls-downstream: yes
	#tls-service-key: "/path/to/privkey.pem"
	#tls-service-pem: "/path/to/fullchain.pem"
		</x-code>

		<p>
			{!! __('writeups.unbound.dns.s3.desc2', [
				'tlssk' => '<code>tls-service-key</code>',
				'tlssp' => '<code>tls-service-pem</code>',
			]) !!}
		</p>

		<!-- Step 4 -->
		<x-tag-md id="dns-s4">{{ __("writeups.unbound.dns.s4.title") }}</x-tag-md>

		<x-code lang="Bash">
sudo unbound-anchor -a /etc/unbound/root.keys
		</x-code>

		<!-- Step 5 -->
		<x-tag-md id="dns-s5">{{ __("writeups.unbound.dns.s5.title") }}</x-tag-md>

		<x-code lang="Bash">
sudo wget "https://www.internic.net/domain/named.cache" -O /etc/unbound/root.hints
		</x-code>

		<!-- Step 6 -->
		<x-tag-md id="dns-s6">{{ __("writeups.unbound.dns.s6.title") }}</x-tag-md>

		<x-code lang="Bash">
sudo crontab -e
		</x-code>

		<x-code lang="crontab">
# Update /etc/unbound/root.hints every 6 months
0 0 1 */6 * wget "https://www.internic.net/domain/named.cache" -O /etc/unbound/root.hints
		</x-code>

		<!-- Step 7 -->
		<x-tag-md id="dns-s7">{{ __("writeups.unbound.dns.s7.title") }}</x-tag-md>

		<x-code lang="Bash">
sudo chown unbound:unbound -R /etc/unbound
		</x-code>

		<!-- Step 8 -->
		<x-tag-md id="dns-s8">{{ __("writeups.unbound.dns.s8.title") }}</x-tag-md>

		<x-code lang="Bash">
dig @127.0.0.1 example.com +nocomments
dig @::1 example.com +nocomments
		</x-code>

		<p>
			{{ __('writeups.unbound.dns.s8.output') }}
		</p>

		<x-code lang="plain">
; <<>> DiG 9.20.9-2-Debian <<>> @127.0.0.1 example.com +nocomments
; (1 server found)
;; global options: +cmd
;example.com.                   IN      A
example.com.            264     IN      A       23.215.0.138
example.com.            264     IN      A       96.7.128.175
example.com.            264     IN      A       96.7.128.198
example.com.            264     IN      A       23.192.228.80
example.com.            264     IN      A       23.192.228.84
example.com.            264     IN      A       23.215.0.136
;; Query time: 0 msec
;; SERVER: 127.0.0.1#53(127.0.0.1) (UDP)
;; WHEN: (Redacted)
;; MSG SIZE  rcvd: 136
		</x-code>

		<!-- Step 9 -->
		<x-tag-md id="dns-s9">{{ __("writeups.unbound.dns.s9.title") }}</x-tag-md>

		<x-card-alert>
			{!! __('writeups.unbound.dns.s9.warning.desc', [
				'file' => '<code class="d">/etc/resolv.conf</code>',
			]) !!}

			<x-code lang="Bash">
ls -l /etc/resolv.conf
			</x-code>

			{{ __("writeups.unbound.dns.s9.warning.desc2") }}

			<x-code lang="plain">
/etc/resolv.conf -> ../run/resolvconf/resolv.conf
			</x-code>

			{!! __("writeups.unbound.dns.s9.warning.desc3", [
				'file' => '<code class="d">/etc/resolv.conf</code>',
			]) !!}

			<x-code lang="Bash">
sudo rm /etc/resolv.conf
			</x-code>
		</x-card-alert>

		<p>
			{!! __('writeups.unbound.dns.s9.desc', [
				'file' => '<code>/etc/resolv.conf</code>',
			]) !!}
		</p>

		<x-code lang="resolv.conf">
nameserver 127.0.0.1
nameserver ::1
		</x-code>

		<!-- Step 10 -->
		<x-tag-md id="dns-s10">{{ __("writeups.unbound.dns.s10.title") }}</x-tag-md>

		<x-code lang="Bash">
sudo chattr +i /etc/resolv.conf
		</x-code>

		<x-card-info>
			{!! __("writeups.unbound.dns.s10.info", [
				'file' => '<code>/etc/resolv.conf</code>',
			]) !!}
		</x-card-info>

		<p>
			{{ __('writeups.unbound.dns.s10.desc') }}
		</p>

		<x-code lang="Bash">
sudo chattr -i /etc/resolv.conf
		</x-code>

		<p>
			{{ __('writeups.unbound.dns.s10.desc2') }}
		</p>

		<!-- Step 11 -->
		<x-tag-md id="dns-s11">{{ __("writeups.unbound.dns.s11.title") }}</x-tag-md>

		<x-code lang="Bash">
sudo systemctl enable --now unbound
		</x-code>
	</x-card>

	<!-- DoH -->
	<x-card class="m-3">
		<x-tag-xl id="doh">DoH</x-tag-xl>

		<p class="mt-0">
			{!! __("writeups.unbound.doh.desc") !!}
		</p>

		<p class="mb-0">
			{{ __("writeups.unbound.doh.requirements.title") }}
		</p>

		<ul class="mt-0">
			<li>
				{{ __("writeups.unbound.doh.requirements.domain") }}
			</li>

			<li>
				{{ __("writeups.unbound.doh.requirements.ports") }}:

				<ul>
					<li>
						<code>443</code> (TCP): HTTP/1.1, HTTP/2
					</li>

					<li>
						<code>443</code> (UDP): HTTP/3 (QUIC)
					</li>
				</ul>
			</li>
		</ul>

		<!-- Step 1 -->
		<x-tag-md id="doh-s1">{{ __("writeups.unbound.doh.s1.title") }}</x-tag-md>

		<x-code lang="Bash">
sudo apt install nginx python3-certbot-nginx
		</x-code>

		<!-- Step 2 -->
		<x-tag-md id="doh-s2">{{ __("writeups.unbound.doh.s2.title") }}</x-tag-md>

		<p class="mt-0">
			{!! __('writeups.unbound.doh.s2.desc', [
				'file' => '<code>/etc/nginx/sites-enabled/doh</code>',
				'port' => '<code>80</code>',
			]) !!}
		</p>

		<p>
			{!! __('writeups.unbound.doh.s2.desc2', [
				'path' => '<code>/var/www/html</code>',
				'file' => '<code>index.html</code>',
			]) !!}
		</p>

		<p>
			{!! __('writeups.unbound.doh.s2.desc3', [
				'domain' => '<code>dns.example.com</code>',
			]) !!}
		</p>

		<x-code lang="bash">
server {
        listen 80;
        listen [::]:80;

        # Change dns.example.com with your (sub)domain
        server_name dns.example.com;

        root /var/www/html;
        index index.html index.htm;

        location / {
                try_files $uri $uri/ =404;
        }
}
		</x-code>

		<!-- Step 3 -->
		<x-tag-md id="doh-s3">{{ __("writeups.unbound.doh.s3.title") }}</x-tag-md>

		<x-code lang="Bash">
sudo certbot --nginx certonly -d dns.example.com
		</x-code>

		<p>
			{{ __('writeups.unbound.doh.s3.desc') }}
		</p>

		<!-- Step 4 -->
		<x-tag-md id="doh-s4">{{ __("writeups.unbound.doh.s4.title") }}</x-tag-md>

		<p class="mt-0">
			{!! __("writeups.unbound.doh.s4.desc", [
				'file' => '<code>/etc/nginx/sites-enabled/doh</code>',
			]) !!}
		</p>

		<x-code lang="Bash">
# Insert additional DoH resolvers here
upstream dns_resolver {
        server 127.0.0.1:4443;
        server [::1]:4443;
}

server {
        # HTTP/1.1 & HTTP/2
        listen 443 ssl;
        listen [::]:443 ssl;

        # HTTP/3 (QUIC)
        listen 443 quic reuseport;
        listen [::]:443 quic reuseport;

        # Change dns.example.com with your (sub)domain
        server_name dns.example.com;

        # HTTP2/3
        http2 on;
        http3 on;
        quic_gso on;
        quic_retry on;
        ssl_early_data on;

        # SSL
        # Change dns.example.com with your (sub)domain
        ssl_stapling off;
        ssl_stapling_verify off;
        include /etc/letsencrypt/options-ssl-nginx.conf;
        ssl_certificate /etc/letsencrypt/live/dns.example.com/fullchain.pem;
        ssl_certificate_key /etc/letsencrypt/live/dns.example.com/privkey.pem;
        ssl_dhparam /etc/letsencrypt/ssl-dhparams.pem;

        # Prevent nginx HTTP Server Detection
        server_tokens off;

        # Only allow GET & POST requests
        if ($request_method !~* ^(GET|POST)$) {
                return 405;
        }

        # Limit max upload size to 1 MB
        client_max_body_size 1M;
        client_body_timeout 5s;
        fastcgi_buffers 64 4K;

        # The settings allows you to optimize the HTTP2 bandwidth.
        # See https://blog.cloudflare.com/delivering-http-2-upload-speed-improvements for tuning hints
        client_body_buffer_size 512k;

        # Allow .well-known/acme-validation
        location ^~ /.well-known/acme-validation/ {
                allow all;
                log_not_found off;
        }

        # DoH endpoint
        location /dns-query {
                grpc_pass grpc://dns_resolver;

                # Inform clients that HTTP3 is available
                add_header Alt-Svc 'h3=":443"; ma=86400';

                # HSTS
                add_header Strict-Transport-Security "max-age=31536000; includeSubDomains; preload" always;
        }
}

server {
        listen 80;
        listen [::]:80;

        # Change dns.example.com with your (sub)domain
        server_name dns.example.com;

        # Prevent nginx HTTP Server Detection
        server_tokens off;

        # Redirect HTTP to HTTPS
        return 301 https://dns.example.com$request_uri;
}
		</x-code>

		<!-- Step 5 -->
		<x-tag-md id="doh-s5">{{ __("writeups.unbound.doh.s5.title") }}</x-tag-md>

		<p class="mt-0">
			{!! __("writeups.unbound.doh.s5.desc", [
				'file' => '<code>/etc/unbound/unbound.conf</code>',
			]) !!}
		</p>

		<x-code lang="plain">
	&nbsp;&nbsp;&nbsp;&nbsp;# DoH
	# Change dns.example.com with your (sub)domain
	interface: 127.0.0.1@4443
	https-port: 4443
	http-endpoint: "/dns-query"
	http-notls-downstream: yes
	tls-service-key: "/etc/letsencrypt/live/dns.example.com/privkey.pem"
	tls-service-pem: "/etc/letsencrypt/live/dns.example.com/fullchain.pem"
		</x-code>

		<!-- Step 6 -->
		<x-tag-md id="doh-s6">{{ __("writeups.unbound.doh.s6.title") }}</x-tag-md>

		<x-code lang="Bash">
sudo systemctl restart unbound
sudo systemctl restart nginx
		</x-code>

		<!-- Step 7 -->
		<x-tag-md id="doh-s7">{{ __("writeups.unbound.doh.s7.title") }}</x-tag-md>

		<p class="mt-0">
			{!! __('writeups.unbound.doh.s7.desc', [
				'b' => '<strong>',
				'eb' => '</strong>',
			]) !!}
		</p>

		<x-code>
https://dns.example.com/dns-query
		</x-code>

		<x-img alt="Firefox DoH" path="writeups/firefox_doh.webp" />

		<p>
			{!! __('writeups.unbound.doh.s7.desc2', [
				'domain' => '<code>example.com</code>',
			]) !!}
		</p>
	</x-card>
	@include('static/home')
</x-hero>

@include('static/footer')
</body>
</html>
