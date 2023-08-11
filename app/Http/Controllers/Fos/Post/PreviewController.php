<?php

namespace App\Http\Controllers\Fos\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class PreviewController extends Controller
{
    public function __invoke($post): View
    {
        $post = Cache::rememberForever(
            key: "post.{$post}",
            callback: fn () => Post::where('id', $post)->first()
        );

        return view('post')
            ->with('post', $post);
    }
}
