<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

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
        collect([
            'short_posts',
            sprintf('post.%s', $post->id),
            sprintf('post.%s', $post->slug),
            'posts.index',
        ])->each(fn ($key) => Cache::forget($key));
    }
}
