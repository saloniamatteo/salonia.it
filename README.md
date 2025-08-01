# [salonia.it](https://salonia.it)
Salonia Matteo's website.

This website is built in **PHP** with the following:
- **Backend**: [Laravel](https://laravel.com)
- **Bundler**: [Vite](https://vite.dev) + [PurgeCSS](https://purgecss.com)

The following are used for the front-end:
- **Framework**: [CirrusUI](https://cirrus-ui.com)
- **Icons**: [Lucide](https://lucide.dev)

Additionally, the following are used for debugging of perf data:
- [Buggregator Trap](https://docs.buggregator.dev/trap/what-is-trap.html)
- [XHProf](https://github.com/longxinH/xhprof)
- [XHProf-Buggregator-Laravel](https://github.com/maantje/xhprof-buggregator-laravel)

## Donate
Support this project: [salonia.it/donate](https://salonia.it/donate)

## Website performance stats
Loaded network resources + time:
![network](Pictures/network.png)

[PageSpeed](https://pagespeed.web.dev) timings:

Mobile:
![pagespeed-mobile](Pictures/pagespeed-mobile.png)

Desktop:
![pagespeed-desktop](Pictures/pagespeed-desktop.png)

## Features
### AbuseIPDB
This Middleware, written by me, checks if the incoming IP address comes from
a "bad" server (crawlers, scanners, etc.), thanks to
[AbuseIPDB](https://www.abuseipdb.com/faq.html)'s `/check` API endpoint.

When a request is received, the `BlockRequest` Middleware will check the cache,
using the incoming IP as key. If a record is found, check if it is a good IP:
if it is, proceed with the request. If it isn't, throw a `403`, which will be
rendered with a pretty page, regardless.

If no records are found in the cache, `BlockRequest` queries AbuseIPDB,
honoring the user-provided options (see below). If the IP address is
whitelisted, check if the user wants to ignore this whitelist;
we then check the IP score and, if it is above a certain threshold,
the request will be blocked, like the case above, throwing a `403`.

To use this, create an account, then head over to [AbuseIPDB/api](https://www.abuseipdb.com/account/api)
and create an APIv2 key. Save this key into the `.env` file:

```env
# If you want to block incoming requests from bad servers
# using AbuseIPDB, enter your API key here.
ABUSEIPDB_KEY= # Your API key goes here!
```

You're all set! Make sure the cache store is also properly configured.
The cache store provided with this site is `file`, so you should be good.

Additionally, you can tune the following parameters:
- `ABUSEIPDB_THRESHOLD`: The minimum percentage score required
                         for an IP to be considered malicious. Default: `35`.
- `ABUSEIPDB_IGNORE_WHITELIST`: Ignore AbuseIPDB's whitelist preference
                                for every IP. Default: `0`.
- `ABUSEIPDB_CACHE_TTL`: Store the results in cache for x minutes. Default: `15`
- `ABUSEIPDB_IP_OK`: Store this string for a known good IP. Default: `OK`
- `ABUSEIPDB_IP_BAD`: Store this string for a known bad IP. Default: `BAD`

### CheckRequest Middleware
This Middleware, written by me, checks if the incoming request method and/or path
are disallowed. If they are, a zip bomb is sent to the client.

Note that this is employed only for those pesky bots & vulnerability scanners.
Normal browsing will not be affected at all.

If you plan on using this middleware, make sure you take a look at
the `paths` array in `config/checkrequest.php`!

### Rate limiter
This website uses Laravel's [rate limiter](https://laravel.com/docs/11.x/rate-limiting).
It uses the same `CACHE_STORE` driver as the AbuseIPDB integration & CheckRequest middleware,
which default to `file`.

The rate limiter is defined in `app/Providers/AppServiceProvider.php` as follows:

```php
/* Bootstrap any application services. */
public function boot()
{
	// Limit to 5 requests per minute.
	RateLimiter::for('global', function (Request $request) {
		if (config('APP_ENV') == 'production') {
			return Limit::perMinute(5)->by($request->ip());
		}
	});
}
```

It is configured to allow a maximum of **5 page requests per minute**,
before throwing an HTTP 429 (Too many requests).

### Asset bundling
Assets are bundled and handled by Vite:
- CSS & JS files are minified (PostCSS and PurgeCSS) and versioned
- Images are versioned

This helps with removing unused code, lowering asset size, and lowering page load times.

Run `npm run build` to re-generate the asset bundle.

### Components
Most HTML components (Card, Hero, Tile, etc.) are split up in several files, under `resources/views/components/`.
This makes it way easier and faster to write new pages, thanks to Blade Templates.

### Caching
Config, events, views, and routes are cached, making site load-times faster.

Run `composer cache` to cache them.

### Localization
You can choose between Italian and English via the header links,
or your browser will automatically negotiate the locale!

Choosing either one will set the site's language to the value you chose,
without having to store the preference in the session/cookies!

The language preference has effect site-wide, and every internal link follows it.

### Minification
Every page is minified. Laravel does not do this by default, and there does not
seem to be a "standard" way to do it, other than downloading some shady package.

I've implemented my own simple HTML minifier, making use of PHP's output buffering.

Additionally, CSS & JS files are minified by PurgeCSS and Vite, respectively.

***

## Setup with Docker
You can easily deploy this website via Docker.
I provided a `Makefile` to make things even simpler:

```bash
make
```

This will use the defaults provided in `.env.docker`, which are:
- CACHE_STORE: `redis`
- SESSION_DRIVER: `redis`
- VALKEY_LOCAL: `yes` (use Valkey inside the container)

The `make` command above will build & deploy this website in a matter of minutes.

If you don't want to use `make` (weirdo :P)
you can directly run `docker compose` (which is what Make runs):

```bash
cp .env.docker .env
docker compose --env-file .env up -d app valkey
```

### Customizing the env
If you want to apply custom settings, make sure you first copy the env:

```bash
cp .env.docker .env
```

This is required for both methods, although `make` does this automagically.

Any changes to `.env` will be replicated in the container the next time it is ran.

### Makefile commands
These commands are provided by the Makefile:
- `build`: Only build the image
- `exec`: Run a shell inside the container
- `logs`: View the logs inside the container
- `restart`: Stop & start the container
- `down`/`stop`: Stop the container
- `up`/`start`: Start the container

### Setting up webserver
This docker image does not ship with a built-in webserver on purpose.
Rather, it exposes a PHP-FPM socket on the host system, at `/var/run/docker-salonia.it/php-fpm.sock`,
with permissions `www-data:www-data` (UID 82 : GID 82), umask 0660 (`rw-rw----`).

At the bottom of this page you will find
[a sample `nginx` config](https://github.com/saloniamatteo/salonia.it#sample-nginx-config).
You can copy that as-is, making sure you modify the following lines:

```nginx
# Change this
root /var/www/example.com/public;

# To this
root /var/www/salonia.it/public;
```

```nginx
# Change this
fastcgi_pass unix:/var/run/php-fpm.sock;

# To this
fastcgi_pass unix:/var/run/docker-salonia.it/php-fpm.sock;
```

Obviously, if you change the paths in Docker, you have to reflect those changes here.

## Manual Setup
### Dependencies
To deploy this website, you need the following:
- `php`
- `composer`
- `nodejs` with `npm`

### Steps
- Clone the repo: `git clone https://github.com/saloniamatteo/salonia.it website`
- Change directory: `cd website`
- Install PHP dependencies: `composer install`
- Install node dependencies: `npm i`
- Generate `APP_KEY`: `php artisan key:generate`

Note that you also may need to change file permissions and/or owner
depending on your setup. If you do, run the following command:

```bash
git config core.fileMode false
```

This stops git from tracking file permission changes.

If you want to deploy the website locally, copy `.env.example` to `.env`:

```bash
cp .env.example .env
```

Make sure you modify `.env`, and uncomment the following:

```env
# Uncomment these values if running locally
APP_ENV=local
APP_DEBUG=true
APP_URL="http://localhost"
```

The website can now be deployed using the built-in webserver, `php artisan serve`:
it will be reachable at `localhost` on port `8000`.

If you want to use the built-in webserver, make sure you set `APP_URL` to your website's URL.

If you want to serve this website to the Internet, please make sure you don't use
`php spark serve`, and rather have a real server.
I use [nginx](https://nginx.org) with [FastCGI](https://nginx.org/en/docs/http/ngx_http_fastcgi_module.html).

Make sure you also disable access to `/build/assets/manifest.json`!

When updating, you may use the `update.sh` script under the `scripts/` folder:

```bash
./scripts/update.sh
```

This does the following:
- Installs the composer + npm dependencies
- Generates a new key, forcefully
- Bundles the assets
- Caches config, events, routes, views.

### Assets
Make sure you bundle the assets used in the website (CSS, fonts, images):

```sh
npm run build
```

### Cache
When running in production, it is recommended to cache PHP assets with the following command:

```sh
composer cache
```

This will cache PHP config, events, routes, views.

### Sample nginx config
Note: this config makes the following assumptions:
- Your site is hosted at `example.com`
- You use LetsEncrypt (`certbot`) and have deployed an SSL certificate
- Your `nginx` build supports HTTP2 and HTTP3 (QUIC)
- You have IPv6 support enabled
- You use port 80 for HTTP and port 443 for HTTPS
- You use php-fpm (FastCGI) and call it via `/var/run/php-fpm.sock`
- You want to disable client uploads
- You want to redirect every HTTP request to the HTTPS port
- You want to allow `robots.txt`
- You want to disable `.well-known`

Remove the `default_server` directives if this isn't your primary website.
Make sure you movify everything that says "Change this"!

Hint: add `quic_bpf on` to `nginx.conf` (ctx: main) if you're using Linux >5.7
to enable routing of QUIC packets using eBPF.

```nginx
# Optional: Rate-limits
#limit_req_zone $binary_remote_addr zone=example_css:10m rate=10r/s;
#limit_req_zone $binary_remote_addr zone=example_img:10m rate=5r/s;

# Bandwidth limits
#limit_conn_zone $binary_remote_addr zone=example_conn_css:10m;
#limit_conn_zone $binary_remote_addr zone=example_conn_img:10m;

server {
	# HTTP/1.1 & HTTP/2
	listen 443 ssl default_server;
	listen [::]:443 ssl default_server;

	# HTTP/3 (QUIC)
	listen 443 quic default_server reuseport;
	listen [::]:443 quic default_server reuseport;

	# Change this!
	server_name example.com www.example.com _;

	# If the host isn't example.com, redirect the client
	# Change this!
	if ($host != example.com) {
		return 301 https://example.com$request_uri;
	}

	# HTTP2/3
	http2 on;
	http3 on;
	quic_gso on;
	quic_retry on;
	ssl_early_data on;

	# SSL
	ssl_stapling on;
	ssl_stapling_verify on;
	include /etc/letsencrypt/options-ssl-nginx.conf;
	ssl_certificate /path/to/fullchain.pem; # Change this!
	ssl_certificate_key /path/to/privkey.pem; # Change this!
	ssl_dhparam /etc/letsencrypt/ssl-dhparams.pem;

	# Site root. Change this!
	root /var/www/example.com/public;

	# Prevent nginx HTTP Server Detection
	server_tokens off;

	# Only allow GET requests
	if ($request_method !~* ^GET$) {
		return 405;
	}

	# Disable uploads
	client_max_body_size 0;
	client_body_timeout 0s;
	fastcgi_buffers 64 4K;

	# The settings allows you to optimize the HTTP2 bandwidth.
	# See https://blog.cloudflare.com/delivering-http-2-upload-speed-improvements for tuning hints
	client_body_buffer_size 512k;

	# Specify how to handle directories -- specifying `/index.php$request_uri`
	# here as the fallback means that Nginx always exhibits the desired behaviour
	# when a client requests a path that corresponds to a directory that exists
	# on the server. In particular, if that directory contains an index.php file,
	# that file is correctly served; if it doesn't, then the request is passed to
	# the front-end controller. This consistent behaviour means that we don't need
	# to specify custom rules for certain paths (e.g. images and other assets,
	# `/updater`, `/ocm-provider`, `/ocs-provider`), and thus
	# `try_files $uri $uri/ /index.php$request_uri`
	# always provides the desired behaviour.
	index index.php index.html /index.php$request_uri;

	# Allow robots.txt
	location = /robots.txt {
		allow all;
		log_not_found off;
	}

	# Allow .well-known/security.txt
	location = /.well-known/security.txt {
		allow all;
		log_not_found off;
	}

	# Prepend all requests with "/index.php" -- this acts as our front controller.
	# index.php handles all requests, but we have to hide it.
	# The line below allows us to do exactly what we want.
	location / {
		rewrite ^ /index.php;
	}

	# Ensure this block, which passes PHP files to the PHP process, is above the blocks
	# which handle static assets (as seen below). If this block is not declared first,
	# then Nginx will encounter an infinite rewriting loop when it prepends `/index.php`
	# to the URI, resulting in a HTTP 500 error response.
	location ~ \.php(?:$|/) {
		fastcgi_split_path_info ^(.+?\.php)(/.*)$;
		set $path_info $fastcgi_path_info;

		# Try to load requested file. If it doesn't exist, instead
		# of throwing a 404, load the front controller, where
		# we can load a pretty 404 page.
		try_files $fastcgi_script_name /index.php/$fastcgi_script_name;

		include fastcgi_params;
		fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
		fastcgi_param PATH_INFO $path_info;
		fastcgi_param HTTPS on;

		fastcgi_param modHeadersAvailable true;		 # Avoid sending the security headers twice
		fastcgi_param front_controller_active true;	 # Enable pretty urls
		fastcgi_pass unix:/var/run/php-fpm.sock;

		fastcgi_intercept_errors on;
		fastcgi_request_buffering off;
		fastcgi_max_temp_file_size 0;

		# Remove X-Powered-By, which is an information leak
		fastcgi_hide_header X-Powered-By;

		# Do not show ratelimit
		fastcgi_hide_header X-Ratelimit-Limit;
		fastcgi_hide_header X-Ratelimit-Remaining;

		# Enable gzip but do not remove ETag headers
		gzip on;
		gzip_vary on;
		gzip_comp_level 4;
		gzip_min_length 256;
		gzip_proxied expired no-cache no-store private no_last_modified no_etag auth;
		gzip_types text/plain;

		# Inform clients that HTTP3 is available
		add_header Alt-Svc 'h3=":443"; ma=86400';

		# COOP/COEP. Disable if you use external plugins/images/assets
		add_header Cross-Origin-Opener-Policy "same-origin" always;
		add_header Cross-Origin-Embedder-Policy "require-corp" always;
		add_header Cross-Origin-Resource-Policy "same-origin" always;

		# Content Security Policy
		# See: https://developer.mozilla.org/en-US/docs/Web/HTTP/CSP
		# This policy allows only internal assets.
		add_header Content-Security-Policy "default-src 'self'; img-src 'self'; script-src 'self'; style-src 'self' 'unsafe-inline'; child-src 'self';";

		# HSTS
		add_header Strict-Transport-Security "max-age=31536000; includeSubDomains; preload" always;

		# HTTP response headers borrowed from Nextcloud `.htaccess`
		add_header Referrer-Policy "no-referrer";
		add_header X-Content-Type-Options "nosniff";
		add_header X-Download-Options "noopen";
		add_header X-Frame-Options "SAMEORIGIN";
		add_header X-Permitted-Cross-Domain-Policies "none";
		add_header X-XSS-Protection "0";

		# Tell browsers to use per-origin process isolation
		add_header Origin-Agent-Cluster "?1" always;
	}

	# Serve static files
	location ~ \.(?:xml|asc)$ {
		add_header Alt-Svc 'h3=":443"; ma=86400';
		add_header Cache-Control "public, max-age=15778463, immutable";
		add_header X-Content-Type-Options "nosniff";
		add_header X-Frame-Options "SAMEORIGIN";

		try_files $uri /index.php$request_uri;
	}

	# CSS & JS
	location ~ \.(?:css|js|woff2)$ {
		# Limit access to CSS & JS
		# Set a burst of 15, and start delaying after the 10th req.
		#limit_req zone=example_css burst=15 delay=10;
		#limit_req_log_level warn;
		#limit_req_status 429;

		# Cap bandwidth to 1MB/s after 1MB,
		# allowing 5 concurrent requests
		#limit_conn example_conn_css 5;
		#limit_rate_after 1M;
		#limit_rate 1M;

		# Enable gzip but do not remove ETag headers
		gzip on;
		gzip_vary on;
		gzip_comp_level 4;
		gzip_min_length 256;
		gzip_proxied expired no-cache no-store private no_last_modified no_etag auth;
		gzip_types font/woff2 text/css text/javascript text/plain;

		add_header Alt-Svc 'h3=":443"; ma=86400';
		add_header X-Content-Type-Options "nosniff";
		add_header X-Frame-Options "SAMEORIGIN";
		add_header Strict-Transport-Security "max-age=31536000; includeSubDomains; preload" always;

		try_files $uri /index.php$request_uri;

		expires 10d;
		access_log off;
	}

	# Images
	location ~ \.(?:gif|ico|jpg|jpeg|pdf|png|svg|webp)$ {
		# Limit access to images
		# Set a burst of 10, and start delaying after the 5th req.
		#limit_req zone=example_img burst=10 delay=5;
		#limit_req_log_level warn;
		#limit_req_status 429;

		# Cap bandwidth to 1MB/s after 1MB,
		# allowing 5 concurrent requests
		#limit_conn example_conn_img 5;
		#limit_rate_after 1M;
		#limit_rate 1M;

		add_header Alt-Svc 'h3=":443"; ma=86400';
		add_header X-Content-Type-Options "nosniff";
		add_header X-Frame-Options "SAMEORIGIN";
		add_header Strict-Transport-Security "max-age=31536000; includeSubDomains; preload" always;

		try_files $uri /index.php$request_uri;

		expires 14d;
		access_log off;
	}
}

server {
	listen 80 default_server;
	listen [::]:80 default_server;
	server_name _;

	# Prevent nginx HTTP Server Detection
	server_tokens off;

	# Change this!
	return 301 https://example.com$request_uri;
}
```
