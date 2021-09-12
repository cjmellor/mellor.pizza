<?php

namespace App\View\Components;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostsList extends Component
{
    public function __construct(public int $limit = 5)
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|string|Closure
    {
        $posts = Post::query()
            ->select(['title', 'slug', 'excerpt'])
            ->latest()
            ->published()
            ->take($this->limit)
            ->get();

        return view('components.posts-list')
            ->with('posts', $posts);
    }
}