<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class ShowPostController extends Controller
{
    public function __invoke($slug): View
    {
        $post = Cache::rememberForever(
            key: "post.{$slug}",
            callback: fn () => Post::whereSlug($slug)->first()
        );

        return view('post')->with('post', $post);
    }
}
