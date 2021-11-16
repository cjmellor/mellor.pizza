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
                x-transition:enter="ease-in-out duration-700"
                x-transition:enter-start="translate-y-full"
                x-transition:enter-end="translate-y-0"
                x-transition:leave="ease-in-out duration-300"
                x-transition:leave-start="translate-y-0"
                x-transition:leave-end="translate-y-full"
            ANIMATE;
        });

        Blade::directive('showHide', function () {
            return <<< 'ANIMATE'
               x-transition:enter="ease-out duration-200"
               x-transition:enter-start="opacity-0 scale-95"
               x-transition:enter-end="opacity-100 scale-100"
               x-transition:leave="ease-in duration-75"
               x-transition:leave-start="opacity-100 scale-100"
               x-transition:leave-end="opacity-0 scale-95"
            ANIMATE;
        });
    }
}
