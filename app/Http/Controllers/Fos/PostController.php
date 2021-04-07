<?php

namespace App\Http\Controllers\Fos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Fos\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Str;

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
        $posts = Post::with('author')->latest()->get();

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
        $post = new Post();

        $post->author()->associate(auth()->id());
        $post->category()->associate($request->category_id);

        $post->fill($request->validated());
        $post->slug = Str::slug($request->title);

        // If the post is Markdown, update model
        if ($post->content_type === 'markdown') {
            $post->is_markdown = true;
        }

        $post->saveOrFail();

        // Add tags if they don't exist, otherwise, update the model
        $post->tags()->sync($this->tagsOrCreate($request));

        return redirect()->route('posts.index')
            ->with('alert_status', 'New post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Post $post)
    {
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
        if ($request->is_published) {
            $post->is_published = true;
        }

        $post->fill($request->validated());
        $post->slug = Str::slug($request->title);

        $post->category()->associate($request->category_id);

        $post->saveOrFail();

        $post->tags()->sync($this->tagsOrCreate($request));

        return redirect()->route('posts.show', $post)
            ->with('alert_status', 'Blog post has been updated');
    }

    /**
     * Get a list of tag IDs from the request.
     * If a tag doesn't exist, it is created
     * -----
     * Code inspired by @themsaid
     * https://github.com/themsaid/wink/blob/1.x/src/Http/Controllers/PostsController.php#L115-L129
     *
     * @param $request
     * @return array
     */
    public function tagsOrCreate($request): array
    {
        $tags = Tag::all();

        return collect($request->tag_id)
            ->map(function ($postTags) use ($tags): string {
                $tag = $tags->firstWhere('id', $postTags);

                if (is_null($tag)) {
                    $tag = Tag::create([
                        'name' => Str::slug($postTags),
                    ]);
                }

                return (string) $tag->id;
            })->toArray();
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
