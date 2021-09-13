<?php

namespace App\Actions\Post;

use App\Http\Requests\Fos\PostRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PublishPost
{
    public function __construct(public PostRequest $postRequest)
    {
    }

    /**
     * @throws \Throwable
     */
    public function store(Post $post)
    {
        // If the post is Markdown, update model
        if ($this->postRequest->is_markdown) {
            $post->is_markdown = true;
        }

        $this->handle($post);
    }

    /**
     * @throws \Throwable
     */
    public function handle(Post $post)
    {
        $post->author()->associate(auth()->user()->id);
        $post->category()->associate($this->postRequest->category_id);

        $post->fill($this->postRequest->validated());
        $post->slug = $this->postRequest->title;

        if ($this->postRequest->has('post_image')) {
            $post->post_image = $this->uploadPostHeader();
        }

        $post->saveOrFail();

        // Add tags if they don't exist, otherwise, update the model
        $post->tags()->sync($this->addOrUpdateTags());
    }

    /**
     * Store the requested file in the desired location and return the path.
     */
    protected function uploadPostHeader(): bool|PostRequest|string|null
    {
        // First, if the image is being replaced, then remove the old one.
        if ($this->postRequest->has('post_header_delete')) {
            $this->deleteUnusedImage();
        }

        // TODO: Look into creating images for all browser sizes on store

        if ($this->postRequest->has('post_image')) {
            return $this->postRequest->file('post_image')
                ->storeAs(Str::slug($this->postRequest->title), $this->getFilename(), 'post-headers');
        }

        return null;
    }

    /**
     * When editing a post, you change the header, delete the original.
     */
    private function deleteUnusedImage(): void
    {
        Storage::disk('post-headers')
            ->delete($this->postRequest->post_header_delete);
    }

    /**
     * Generates a random filename with its extension from the uploaded file.
     */
    private function getFilename(): string
    {
        return Str::random().'.'.$this->postRequest->file('post_image')->extension();
    }

    /**
     * Get a list of tag IDs from the request.
     * If a tag doesn't exist, it is created
     * -----
     * Code inspired by @themsaid
     * https://github.com/themsaid/wink/blob/1.x/src/Http/Controllers/PostsController.php#L115-L129.
     */
    public function addOrUpdateTags(): array
    {
        $tags = Tag::all();

        return collect($this->postRequest->tag_id)
            ->map(function ($postTags) use ($tags): string {
                $tag = $tags->firstWhere('id', $postTags);

                if (is_null($tag)) {
                    if (Cache::has('tags')) {
                        Cache::forget('tags');
                    }

                    $tag = Tag::create([
                        'name' => Str::slug($postTags),
                    ]);
                }

                return (string) $tag->id;
            })->toArray();
    }

    /**
     * @throws \Throwable
     */
    public function update(Post $post)
    {
        $post->is_published = (bool) $this->postRequest->is_published;

        $this->handle($post);
    }
}
