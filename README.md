# [salonia.it](https://salonia.it)
Salonia Matteo's website.

This website is built in **PHP** with the following:
- **Backend**: [Laravel](https://laravel.com)
- **Bundler**: [Vite](https://vite.dev) + [PurgeCSS](https://purgecss.com)

The following are used for the front-end:
- **Framework**: [CirrusUI](https://cirrus-ui.com)
- **Icons**: [Lucide](https://lucide.dev)

## Donate
Support this project: [salonia.it/donate](https://salonia.it/donate)

## Features
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

## Dependencies
To deploy this website, you need the following:
- `php`
- `composer`
- `nodejs` with `npm`

## Setup
- Clone the repo: `git clone https://github.com/saloniamatteo/salonia.it website`
- Change directory: `cd website`
- Update PHP dependencies: `composer update`
- Update node dependencies: `npm i`
- Generate `APP_KEY`: `php artisan key:generate`

If you want to deploy the website locally, make sure you modify `.env`,
and uncomment the following:

```env
# Uncomment these values if running in production
APP_ENV=local
APP_DEBUG=true
APP_URL="http://localhost"
```

The website can now be deployed using the built-in webserver, `php artisan serve`:
it will be reachable at `localhost` on port `8000`.

If you want to serve this website to the Internet, please make sure you don't use
`php spark serve`, and rather have a real server.
I use [nginx](https://nginx.org) with [FastCGI](https://nginx.org/en/docs/http/ngx_http_fastcgi_module.html).

If you want to use the built-in webserver, make sure you set `APP_URL` to your website's URL.

## Cache
When running in production, it is recommended to cache PHP assets with the following command:

```sh
composer cache
```

This will cache PHP config, events, routes, views.

Additionally, bundle the assets used in the website (CSS, fonts, images):

```sh
npm run build
```

This is not needed if you don't have assets that differ from the included ones.
