<?php

namespace App\Http\Controllers\Fos\Post;

use App\Actions\Post\PublishPostAction;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function __construct(
        public Category $category,
        public Tag $tag,
    ) {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('fos.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @throws \Throwable
     */
    public function store(Post $post): RedirectResponse
    {
        app(PublishPostAction::class)->handle($post);

        return redirect()->route('fos.posts.index')
            ->with('alert_status', 'New post created');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {
        return view('fos.posts.edit')
            ->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @throws \Throwable
     */
    public function update(Post $post): RedirectResponse
    {
        app(PublishPostAction::class)->handle($post);

        return redirect()->route('fos.index', $post)
            ->with('alert_status', 'Blog post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws \Exception
     */
    public function destroy(Post $post): RedirectResponse
    {
        Cache::forget('posts.index');

        $post->delete();

        return redirect()
            ->route('fos.posts.index')
            ->with(['alert_status' => 'Blog post has been archived']);
    }
}
