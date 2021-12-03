<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Model::preventLazyLoading(! $this->app->isProduction());

        // "Reading Time"
        Str::macro('readingTime', function (...$text) {
            $totalWords = str_word_count(implode(' ', $text));

            $minutes = max(1, ceil(num: $totalWords / 200));

            return ($minutes > 1) ? $minutes.' minutes' : $minutes.' minute';
        });
    }
}
