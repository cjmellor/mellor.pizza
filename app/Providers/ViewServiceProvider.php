<?php

namespace App\Providers;

use App\Http\ViewComposers\Fos\PostComposer;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        View::composer(['fos.posts.create', 'fos.posts.edit'],
            PostComposer::class
        );
    }
}
