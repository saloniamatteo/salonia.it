@use('App\Helpers\Url')
@include('static/head', [
    "lang"  => app()->getLocale(),
    "title" => __("writeups.spl.title"),
    "desc"  => __("writeups.spl.desc"),
])

<body>
@include('static/header')

<!-- SSH Passwordless Login -->
<x-hero class="mt-4" id="ssh-passwordless-login" img="writeups/spl.webp" alt="{{ __('writeups.spl.title') }}">
	<x-slot:title>
		{{ __("writeups.spl.title") }}
	</x-slot>

	<x-slot:desc>
		{{ __("writeups.spl.desc") }}
	</x-slot>

	<!-- Go to -->
	<p>
		{{ __("glob.go-to") }}:


		<!-- Client -->
		<x-tag-xs href="client">
			Client
		</x-tag-xs>

		&nbsp;

		<!-- Server -->
		<x-tag-xs href="server">
			Server
		</x-tag-xs>
	</p>

	<x-card class="m-3">
		<!-- Client -->
		<x-tag-xl id="client">Client</x-tag-xl>


		<p class="my-0">
			{!! __("writeups.spl.client.desc") !!}
		</p>

		<!-- Step 1 -->
		<x-tag-md id="client-s1">{{ __("writeups.spl.client.s1.title") }}</x-tag-md>

		<p class="mt-0">
			{!! __("writeups.spl.client.s1.desc") !!}
		</p>

		<x-code lang="Bash">
ssh-keygen -t rsa -b 4096
		</x-code>

		<p class="my-0">
			{!! __("writeups.spl.client.s1.desc2") !!}
		</p>

		<ul class="mt-0">
			<li>
				{{ __("writeups.spl.client.s1.li.file.title") }}:&nbsp;
				{!! __("writeups.spl.client.s1.li.file.desc", [
					"path" => "<code>/home/<strong>user</strong>/.ssh/id_rsa</code>",
				]) !!}
			</li>

			<li>
				{{ __("writeups.spl.client.s1.li.password.title") }}:&nbsp;
				{{ __("writeups.spl.client.s1.li.password.desc") }}
			</li>
		</ul>

		<!-- Step 2 -->
		<x-tag-md id="client-s2">{{ __("writeups.spl.client.s2.title") }}</x-tag-md>

		<p class="my-0">
			{!! __("writeups.spl.client.s2.desc") !!}
		</p>

		<x-code lang="~/.ssh/config">
Host <strong>server</strong>
	User <strong>user</strong>
	HostName <strong>100.0.10.2</strong>
		</x-code>

		<p>
		{{ __("writeups.spl.client.s2.desc2") }}
		</p>

		<ul>
			<li>
				Host:&nbsp;
				{!! __("writeups.spl.client.s2.li.host", [
						'cmd' => '<code>ssh server</code>',
				]) !!}
			</li>

			<li>
				User:&nbsp;
				{{ __("writeups.spl.client.s2.li.user") }}
			</li>

			<li>
				HostName:&nbsp;
				{!! __("writeups.spl.client.s2.li.hostname", [
					'ip' => '<code>100.0.10.2</code>',
					'hosts' => '<code>myserver</code>',
					'domain' => '<code>example.com</code>'
				]) !!}
			</li>
		</ul>

		<!-- Step 3 -->
		<x-tag-md id="client-s3">{{ __("writeups.spl.client.s3.title") }}</x-tag-md>

		<p class="my-0">
			{{ __("writeups.spl.client.s3.desc") }}
		</p>

		<x-code lang="Bash">
ssh-copy-id <strong>server</strong>
		</x-code>

		<p>
			{{ __("writeups.spl.client.s3.desc2") }}
		</p>

		<x-code lang="Bash">
ssh <strong>server</strong>
		</x-code>

		<p>
			{!! __("writeups.spl.client.s3.desc3", [
				'file' => '<code>~/.ssh/authorized_keys</code>'
			]) !!}
		</p>

		<x-code lang="~/.ssh/authorized_keys">
			ssh-rsa AAAA... user@host
		</x-code>

		<p class="mb-0">
			{{ __("writeups.spl.client.s3.desc4") }}
		</p>

		<ul class="mt-0">
			<li>
				ssh-rsa:&nbsp;
				{{ __("writeups.spl.client.s3.li.ssh-rsa") }}
			</li>

			<li>
				AAAAA...:&nbsp;
				{{ __("writeups.spl.client.s3.li.pkey") }}
			</li>

			<li>
				user@host:&nbsp;
				{{ __("writeups.spl.client.s3.li.host") }}
			</li>
		</ul>
	</x-card>

	<x-card class="m-3">
		<!-- Server -->
		<x-tag-xl id="server">Server</x-tag-xl>


		<p class="my-0">
			{!! __("writeups.spl.server.desc") !!}
		</p>

		<!-- Step 1 -->
		<x-tag-md id="server-s1">{{ __("writeups.spl.server.s1.title") }}</x-tag-md>

		<p class="my-0">
			{!! __("writeups.spl.server.s1.desc", [
				'path' => '<code>/etc/ssh/sshd_config</code>'
			]) !!}
		</p>

		<x-code lang="/etc/ssh/sshd_config">
# Disable root login
PermitRootLogin no

# Lower login attempt count
MaxAuthTries 3

# Disable password login
PubkeyAuthentication yes
PasswordAuthentication no
ChallengeResponseAuthentication no
UsePAM no
		</x-code>

		<!-- Step 2 -->
		<x-tag-md id="server-s2">{{ __("writeups.spl.server.s2.title") }}</x-tag-md>

		<p class="my-0">
			{{ __("writeups.spl.server.s2.desc") }}
		</p>

		<x-code lang="Bash">
systemctl start sshd # Debian, CentOS, Fedora, RHEL
# OR
service ssh restart # Older Debian & Sysvinit users
# OR
rc-service sshd restart # OpenRC users (Gentoo)
		</x-code>

		<p class="my-0">
			{{ __("writeups.spl.server.s2.desc2") }}
		</p>

	</x-card>
	@include('static/home')
</x-hero>

@include('static/footer')
</body>
</html>
