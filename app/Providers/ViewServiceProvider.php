<?php

namespace App\Providers;

use App\Http\ViewComposers\Posts\CategoriesTagsViewComposer;
use App\Http\ViewComposers\Posts\PostsListViewComposer;
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
        View::composers([
            ['fos.posts.create', 'fos.posts.edit'], CategoriesTagsViewComposer::class,
        ]);
    }
}
