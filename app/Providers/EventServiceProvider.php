<?php

namespace App\Providers;

use App\Models\Post;
use App\Observers\PostObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        //
    ];

    public function boot()
    {
        Post::observe(PostObserver::class);
    }

    public function shouldDiscoverEvents()
    {
        return false;
    }
}
