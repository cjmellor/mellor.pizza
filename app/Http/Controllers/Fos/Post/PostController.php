<?php

namespace App\Http\Controllers\Fos\Post;

use App\Actions\Post\PublishPost;
use App\Http\Controllers\Controller;
use App\Http\Requests\Fos\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
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
    public function index(): \Illuminate\Contracts\View\View
    {
        $posts = Cache::remember('posts.index', now()->addDay(), fn () => Post::with('author')->latest()->get());

        return view('fos.posts.index')
            ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        return view('fos.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @throws \Throwable
     */
    public function store(PostRequest $request, Post $post): \Illuminate\Http\RedirectResponse
    {
        (new PublishPost($request, $post))->create();

        return redirect()->route('posts.index')
            ->with('alert_status', 'New post created');
    }

    /**
     * Display the specified resource.
     *
     * Removed implicit model binding in favour of caching
     */
    public function show(int $post): \Illuminate\Contracts\View\View
    {
        $post = Cache::rememberForever("post.{$post}", fn () => Post::find($post));

        return view('fos.posts.show')
            ->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): \Illuminate\Contracts\View\View
    {
        return view('fos.posts.edit')
            ->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @throws \Throwable
     */
    public function update(PostRequest $request, Post $post): \Illuminate\Http\RedirectResponse
    {
        (new PublishPost($request, $post))->edit();

        return redirect()->route('posts.show', $post)
            ->with('alert_status', 'Blog post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws \Exception
     */
    public function destroy(Post $post): \Illuminate\Http\RedirectResponse
    {
        Cache::forget('posts.index');

        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with(['alert_status' => 'Blog post has been archived']);
    }
}
