<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class PostObserver
{
    public function created(Post $post)
    {
        //
    }

    public function updated(Post $post)
    {
        //
    }

    public function saved(Post $post)
    {
        if (Cache::has('post.'.$post->id)) {
            Cache::forget('post.'.$post->id);
        }

        if (Cache::has('posts.index')) {
            Cache::forget('posts.index');
        }
    }

    public function deleted(Post $post)
    {
        //
    }

    public function restored(Post $post)
    {
        //
    }

    public function forceDeleted(Post $post)
    {
        //
    }
}
