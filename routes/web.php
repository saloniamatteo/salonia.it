<?php

// Don't forget to run this in production!
// php artisan route:cache

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

// Throttle all requests using the "global" throttler.
Route::middleware(['throttle:global'])->group(function () {
    // Lang-only request
    // Example: /it
    Route::get('{lang}', [PageController::class, 'viewLang'])
        ->whereIn('lang', Config::get("locale.languages"));

    // Page request (can be blank for index)
    // Example: /
    // Example: /page
    Route::get('{page?}', [PageController::class, 'view']);

    // Lang + page request
    // Example: /it
    // Example: /it/page
    Route::get('{lang}/{page?}', [PageController::class, 'viewLang'])
        ->whereIn('lang', Config::get("locale.languages"))
        ->whereAlpha('page');

    // Writeups
    // Example: /writeups/page
    Route::get('/writeups/{page}', [PageController::class, 'viewWriteups']);

    // Writeups + lang
    Route::get('{lang}/writeups/{page}', [PageController::class, 'viewWriteupsLang'])
        ->whereIn('lang', Config::get("locale.languages"));

});
