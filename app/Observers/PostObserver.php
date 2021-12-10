<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostObserver
{
    public function updated(Post $post)
    {
        if (($post->isDirty(attributes: 'slug')) && (! Storage::disk(name: config('filesystems.default'))->exists($post->getOriginal(key: 'slug')))) {
            Storage::disk(name: config('filesystems.default'))->rename('post_headers/'.$post->getOriginal(key: 'slug'), 'post_headers/'.$post->slug);
        }
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
