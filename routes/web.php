<?php

// Don't forget to run this in production!
// php artisan route:cache

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Throttle all requests using the "global" throttler.
Route::middleware(['throttle:global'])->group(function () {
    // Lang-only request
    Route::get('{lang}', [PageController::class, 'viewLang'])
        ->whereIn('lang', ['it', 'en']);

    // Page request (can be blank for index)
    Route::get('{page?}', [PageController::class, 'view']);

    // Lang + page request
    Route::get('{lang}/{page?}', [PageController::class, 'viewLang'])
        ->whereIn('lang', ['it', 'en'])
        ->whereAlpha('page');
});
