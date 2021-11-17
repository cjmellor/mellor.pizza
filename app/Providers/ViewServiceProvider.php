<?php

namespace App\Providers;

use App\Http\ViewComposers\Posts\CategoriesTagsViewComposer;
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
        View::composer(['components.fos.create-edit'], CategoriesTagsViewComposer::class);
    }
}
