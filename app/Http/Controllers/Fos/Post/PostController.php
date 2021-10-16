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
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = Cache::remember(
            key: 'posts.index',
            ttl: now()->addDay(),
            callback: fn () => Post::with('author')->latest()->get()
        );

        return view(view: 'fos.posts.index')
            ->with('posts', $posts);
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
        app(PublishPostAction::class)->store($post);

        return redirect()->route('fos.posts.index')
            ->with('alert_status', 'New post created');
    }

    /**
     * Display the specified resource.
     *
     * Removed implicit model binding in favour of caching
     */
    public function show(int $post): View
    {
        $post = Cache::rememberForever(
            key: "post.{$post}",
            callback: fn (): ?Post => Post::find($post)
        );

        return view('fos.posts.show')
            ->with('post', $post);
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
        app(PublishPostAction::class)->update($post);

        return redirect()->route('fos.posts.show', $post)
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
