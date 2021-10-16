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
        Blade::directive('slideUp', function () {
            return <<< 'ANIMATE'
                x-transition:enter="transition ease-in-out duration-700"
                x-transition:enter-start="transform translate-y-full"
                x-transition:enter-end="transform translate-y-0"
                x-transition:leave="transition ease-in-out duration-300"
                x-transition:leave-start="transform translate-y-0"
                x-transition:leave-end="transform translate-y-full"
            ANIMATE;
        });

        Blade::directive('showHide', function () {
            return <<< 'ANIMATE'
               x-transition:enter="transition ease-out duration-200"
               x-transition:enter-start="transform opacity-0 scale-95"
               x-transition:enter-end="transform opacity-100 scale-100"
               x-transition:leave="transition ease-in duration-75"
               x-transition:leave-start="transform opacity-100 scale-100"
               x-transition:leave-end="transform opacity-0 scale-95"
            ANIMATE;
        });
    }
}
