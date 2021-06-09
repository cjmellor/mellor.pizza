<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class BlogPostController extends Controller
{
    public function __invoke(string $slug): View
    {
        $post = Cache::remember("post.{$slug}", now()->addMonth(), fn () => Post::whereSlug($slug)->first());

        return view('post')->with('post', $post);
    }
}
