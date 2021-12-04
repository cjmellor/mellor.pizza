<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
    public function updated(Post $post)
    {
        if (($post->isClean(attributes: 'slug')) && (Storage::disk(name: 's3')->exists($post->getOriginal(key: 'slug')))) {
            return;
        }

        Storage::disk(name: 's3')->rename($post->getOriginal(key: 'slug'), $post->slug);
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
}
