<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /* Register any application services. */
    public function register() {}

    /* Bootstrap any application services. */
    public function boot()
    {
        // Limit to 5 requests per minute.
        RateLimiter::for('global', function (Request $request) {
            return Limit::perMinute(5)->by($request->ip());
        });
    }
}
