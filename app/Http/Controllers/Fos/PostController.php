<?php

namespace App\Http\Controllers\Fos;

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
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = Cache::remember('posts.index', now()->addDay(), fn() => Post::with('author')->latest()->get());

        return view('fos.posts.index')
            ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('fos.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Fos\PostRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function store(PostRequest $request)
    {
        (new PublishPost($request))->create();

        return redirect()->route('posts.index')
            ->with('alert_status', 'New post created');
    }

    /**
     * Display the specified resource.
     *
     * Removed implicit model binding in favour of caching
     *
     * @param $post
     * @return \Illuminate\Contracts\View\View
     */
    public function show($post)
    {
        $post = Cache::rememberForever('post.'.$post, fn() => Post::find($post));

        return view('fos.posts.show')
            ->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Post $post)
    {
        return view('fos.posts.edit')
            ->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Fos\PostRequest  $request
     * @param  Post  $post
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function update(PostRequest $request, Post $post)
    {
        (new PublishPost($request, $post))->edit();

        return redirect()->route('posts.show', $post)
            ->with('alert_status', 'Blog post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with(['alert_status' => 'Blog post has been archived']);
    }
}
