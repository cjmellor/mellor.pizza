<?php

namespace App\Http\Controllers\Fos\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\View\View;

class PreviewController extends Controller
{
    public function __invoke(Post $post): View
    {
        return view('post')
            ->with('post', $post);
    }
}
