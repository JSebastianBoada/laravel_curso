<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use RateLimiter;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        RateLimiter::for('reviews', function (Request $request) {
            return Limit::perHour(10)->by($request->user()?->id ?: $request->ip());
        });
    }
}
