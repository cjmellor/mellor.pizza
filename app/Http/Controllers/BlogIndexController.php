<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class BlogIndexController extends Controller
{
    public const PER_PAGE = 10;

    public function __invoke(): View
    {
        $posts = Cache::remember(
            key: 'blog.posts.paginated',
            ttl: now()->addDay(),
            callback: fn () => Post::published()->simplePaginate(perPage: self::PER_PAGE),
        );

        return view('blog')
            ->with('posts', $posts);
    }
}
