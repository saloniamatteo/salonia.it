<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Pages;

$routes->setDefaultController('Pages::index');
$routes->setDefaultMethod('index');

// Index
$routes->get('/', 'Pages::index');

// Get list of supported locales
$locales = config("App")->supportedLocales;
$locale_regex = "";

// Create locale regex for route (e.g. "en|it")
for ($i = 0; $i < count($locales); $i++) {
    $locale_regex .= $locales[$i];

    if ($i != count($locales) - 1)
        $locale_regex .= "|";
}

// Hack: if we put "{locale}" instead of "(:lang)",
// codeigniter actually matches any string,
// not allowing us to request pages like "/package".
// This way, we can not only request pages like the above,
// but we can also request only a locale,
// and get the index with the requested locale.
$routes->addPlaceholder('lang', $locale_regex);
$routes->get('(:lang)', [Pages::class, 'index']);

// All other pages
$routes->get('(:segment)', [Pages::class, 'view']);
$routes->get('{locale}/(:segment)', [Pages::class, 'view']);
