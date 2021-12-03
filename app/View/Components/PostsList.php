<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class PostsList extends Component
{
    public function __construct(
        public Post $post,
        public string $format = 'full',
        public int $limit = 5
    ) {
    }

    public function render(): View
    {
        $posts = Cache::remember(
            key: 'short_posts',
            ttl: now()->addDay(),
            callback: fn () => $this->post
                ->with('tags:name', 'author:id,name')
                ->published()
                ->take($this->limit)
                ->latest()
                ->get()
        );

        return view('components.posts-list')
            ->with('posts', $posts);
    }
}
