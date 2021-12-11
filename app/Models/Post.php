<?php

namespace App\Models;

use App\Concerns\Convert;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use League\CommonMark\Output\RenderedContentInterface;

class Post extends Model
{
    use Convert;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'post_content',
        'is_published',
        'post_image',
        'post_image_caption',
    ];

    protected $appends = [
        'published_at',
    ];

    protected $casts = [
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

    public function getContentAttribute(): bool|RenderedContentInterface
    {
        if ($this->post_content == null) {
            return false;
        }

        return $this->convert($this->post_content);
    }

    public function getPublishedAttribute(): bool
    {
        return $this->is_published;
    }

    public function getPublishedAtAttribute(): mixed
    {
        return $this->created_at;
    }

    public function getPostImageAttribute(string|null $value): string
    {
        return ! $value == null ? sprintf('post_headers/%s/%s', Str::slug($this->title), $value) : '';
    }

    public function setSlugAttribute(string $value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }
}
