<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
    public function updated(Post $post): void
    {
        if (! $post->isDirty(attributes: 'slug')) {
            return;
        }
        if (Storage::disk(name: config('filesystems.default'))->exists($post->getOriginal(key: 'slug'))) {
            return;
        }
        Storage::disk(name: config('filesystems.default'))->move('post_headers/'.$post->getOriginal(key: 'slug'), 'post_headers/'.$post->slug);
    }

    public function saved(Post $post): void
    {
        collect([
            'short_posts',
            sprintf('post.%s', $post->id),
            sprintf('post.%s', $post->slug),
            'posts.index',
        ])->each(fn ($key) => Cache::forget($key));
    }
}
