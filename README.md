# [salonia.it](https://salonia.it)
Salonia Matteo's website.

This website is built in **PHP**, using [CodeIgniter 4](https://codeigniter.com).
Additionally, [PurgeCSS](https://purgecss.com) is used in order to strip out unused CSS.

[CirrusUI](https://cirrus-ui.com) is the used CSS Framework,
and icons come from [Lucide](https://lucide.dev).

## Dependencies
### Runtime dependencies
- `php`
- `composer`

### Development dependencies
- `npm` (nodejs)
- `purgecss`

## Setup
- Clone the repo: `git clone https://github.com/saloniamatteo/salonia.it website`
- Change directory: `cd website`
- Update PHP dependencies: `composer update`

If you want to deploy a development server: `php spark serve` (optionally, specify `--host` and `--port`)

Additionally, make sure you modify the provided `.env` file:

```env
# CodeIgniter environment file
# =============================

# Override for development
CI_ENVIRONMENT = development

# Used for local development
app.baseURL = "http://localhost:8080"
```

If you want to serve this website to the Internet, please make sure you don't use
`php spark serve`, and rather have a real server.

I use [nginx](https://nginx.org) with [FastCGI](https://nginx.org/en/docs/http/ngx_http_fastcgi_module.html).

## PurgeCSS
After writing whatever code, it is recommended to run purgecss to minify CSS, and remove unused resources.

Ideally, if you knew you used a component that was NOT included in the already-stripped-and-minified
provided distribution of `cirrus.min.css`, you'd re-download the file, then ran the minifier.

- Make sure node dependencies are met: `npm install`
- Optionally, to update dependencies to the latest version: `npm update`
- Finally, run PurgeCSS: `npm run purge`

The command above is declared inside the `package.json` file.
It is configured to look in `app/Views/**/*.php`, and `public/css/cirrus.min.css`.
Note that we do NOT touch font files under `public/css/fonts` (and `public/css/fonts.css`, for that matter)
because there is nothing to purge, nor minify.

The resulting file is written under `public/css/`,
where the tool knows to automatically use the same name.
