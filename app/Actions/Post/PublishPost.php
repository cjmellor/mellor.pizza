<?php

namespace App\Actions\Post;

use App\Http\Requests\Fos\PostRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class PublishPost
{
    public function __construct(
        public PostRequest $request,
        public Post $post
    ) {
    }

    /**
     * @throws \Throwable
     */
    public function create()
    {
        // If the post is Markdown, update model
        if ($this->request->is_markdown) {
            $this->post->is_markdown = true;
        }

        $this->execute();
    }

    /**
     * @throws \Throwable
     */
    public function execute()
    {
        $this->post->author()->associate(auth()->user()->id);
        $this->post->category()->associate($this->request->category_id);

        $this->post->fill($this->request->validated());
        $this->post->slug = $this->request->title;

        $this->post->saveOrFail();

        // Add tags if they don't exist, otherwise, update the model
        $this->post->tags()->sync($this->addOrUpdateTags());

        $this->clearCache();
    }

    /**
     * Get a list of tag IDs from the request.
     * If a tag doesn't exist, it is created
     * -----
     * Code inspired by @themsaid
     * https://github.com/themsaid/wink/blob/1.x/src/Http/Controllers/PostsController.php#L115-L129
     *
     * @return array
     */
    public function addOrUpdateTags(): array
    {
        $tags = Tag::all();

        return collect($this->request->tag_id)
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
     * When updating the post, it will still be cached, so reset the cache first...
     */
    protected function clearCache(): void
    {
        if (Cache::has('post.'.$this->post->id)) {
            Cache::forget('post.'.$this->post->id);
        }

        if (Cache::has('posts.index')) {
            Cache::forget('posts.index');
        }
    }

    /**
     * @throws \Throwable
     */
    public function edit()
    {
        $this->post->is_published = (bool) $this->request->is_published;

        $this->execute();
    }
}