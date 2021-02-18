<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Str;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'post_image',
        'post_image_caption',
    ];

    protected $appends = [
        'published_at',
    ];

    protected $casts = [
        'is_markdown' => 'boolean',
        'is_published' => 'boolean',
    ];

    /**
     * A 'Post' belongs to a 'User'
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A 'Post' belongs to a 'Category'
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * A 'Post' belongs to many 'Tags'
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Check if a post is published
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    /**
     * Check if a post is in draft mode
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDraft(Builder $query): Builder
    {
        return $query->where('is_published', false);
    }

    /**
     * Check if a post is in Markdown format, otherwise, return HTML
     *
     * Usage: $this->content()
     *
     * @return string
     */
    public function getContentAttribute(): string
    {
        if ($this->is_markdown) {
            return Str::of($this->body)->markdown([
                'html_input' => 'strip',
            ]);
        }

        return $this->body;
    }

    /**
     * Supply a 'published_at' attribute for better API readability
     *
     * @return mixed
     */
    public function getPublishedAtAttribute(): mixed
    {
        return $this->created_at;
    }

    /**
     * I may use this later...
     */
//    public function serializeDate($date): string
//    {
//        return $date->format('U');
//    }
}
