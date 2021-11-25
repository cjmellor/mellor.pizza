<?php

namespace App\Actions\Post;

use App\Http\Requests\Fos\PostRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PublishPostAction
{
    public function __construct(
        public PostRequest $postRequest,
        public Post $post
    ) {
    }

    public function handle($post)
    {
        // If the post is Markdown, update model
        if ($this->postRequest->is_markdown) {
            $post->is_markdown = true;
        }

        $post->author()->associate(auth()->user()->id);
        $post->category()->associate($this->postRequest->category_id);

        $post->fill($this->postRequest->validated());

        $post->slug = $this->postRequest->title;
        $post->is_published = (bool)$this->postRequest->is_published;

        if (! $this->postRequest->has('post_image') && (! $this->postRequest->has('post_header_delete'))) {
            $post->post_image = $this->deleteUnusedImage();
        }

        if ($this->postRequest->has('post_image')) {
            $post->post_image = $this->uploadPostHeader();
        }

        $post->saveOrFail();

        // Add tags if they don't exist, otherwise, update the model
        $post->tags()->sync($this->addOrUpdateTags());
    }

    private function deleteUnusedImage()
    {
        Storage::disk('post-headers')
            ->deleteDirectory(Str::slug($this->postRequest->title));

        if (! $this->postRequest->has('post_image_delete')) {
            return null;
        }
    }

    protected function uploadPostHeader(): bool|string
    {
        // First, if the image is being replaced, then remove the old one.
        if ($this->postRequest->has('post_header_delete')) {
            $this->deleteUnusedImage();
        }

        return $this->postRequest->file('post_image')
            ->storeAs(Str::slug($this->postRequest->title), $this->getFilename(), 'post-headers');
    }

    private function getFilename(): string
    {
        return Str::random().'.'.$this->postRequest->file('post_image')->extension();
    }

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

                return (string)$tag->id;
            })->toArray();
    }
}
