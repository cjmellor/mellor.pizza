<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class PostObserver
{
    /**
     * Handle the post "created" event.
     *
     * @param  Post  $post
     */
    public function created(Post $post)
    {
        //
    }

    /**
     * Handle the post "updated" event.
     *
     * @param  Post  $post
     */
    public function updated(Post $post)
    {
        //
    }

    /**
     * Handle the post "saved" event.
     *
     * @param  Post  $post
     */
    public function saved(Post $post)
    {
        if (Cache::has('post.'.$post->id)) {
            Cache::forget('post.'.$post->id);
        }

        if (Cache::has('posts.index')) {
            Cache::forget('posts.index');
        }
    }

    /**
     * Handle the post "deleted" event.
     *
     * @param  Post  $post
     */
    public function deleted(Post $post)
    {
        //
    }

    /**
     * Handle the post "restored" event.
     *
     * @param  Post  $post
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the post "force deleted" event.
     *
     * @param  Post  $post
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
