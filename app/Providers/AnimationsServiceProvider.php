<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AnimationsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        Blade::directive('slideUp', function ($expression) {
            return <<< 'ANIMATIONS'
                x-transition:enter="transition ease-in-out duration-700"
                x-transition:enter-start="transform translate-y-full"
                x-transition:enter-end="transform translate-y-0"
                x-transition:leave="transition ease-in-out duration-300"
                x-transition:leave-start="transform translate-y-0"
                x-transition:leave-end="transform translate-y-full"
            ANIMATIONS;
        });
    }
}
