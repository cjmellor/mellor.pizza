<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'post_content',
        'is_published',
        'is_markdown',
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

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)
            ->orderBy('name');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function scopeDraft(Builder $query): Builder
    {
        return $query->where('is_published', false);
    }

    public function getContentAttribute(): bool|string
    {
        if ($this->post_content == null) {
            return false;
        }

        // If in 'edit' mode, display content as-is from the DB
        if ($this->isInEditMode()) {
            return $this->post_content;
        }

        // If the content is Markdown and *not* in edit mode, convert to HTMl
        return $this->is_markdown
            ? Str::of($this->post_content)->markdown(['html_input' => 'strip'])
            : $this->post_content;
    }

    public function isInEditMode(): bool
    {
        return request()->routeIs('fos.posts.edit');
    }

    public function getContentTypeAttribute(): string
    {
        return $this->is_markdown ? 'markdown' : 'html';
    }

    public function getPublishedAttribute(): bool
    {
        return $this->is_published;
    }

    public function getPublishedAtAttribute(): mixed
    {
        return $this->created_at;
    }

    public function setSlugAttribute(string $value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }
}
