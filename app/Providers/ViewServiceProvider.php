<?php

namespace App\Providers;

use App\Http\ViewComposers\Posts\CategoriesTagsViewComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        View::composer(['components.fos.create-edit'], CategoriesTagsViewComposer::class);
    }
}
