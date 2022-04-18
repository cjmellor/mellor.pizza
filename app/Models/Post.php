<?php

namespace App\Models;

use App\Concerns\Convert;
use App\Enums\PostStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'is_published' => PostStatus::class,
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
            ->oldest('name');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', PostStatus::Published);
    }

    public function scopeDraft(Builder $query): Builder
    {
        return $query->where('is_published', PostStatus::Draft);
    }

    public function content(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->convert($this->post_content),
        );
    }

    public function published(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->is_published,
        );
    }

    public function publishedAt(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->created_at,
        );
    }

    public function postImage(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ! $value == null ? sprintf('post_headers/%s/%s', str()->slug($this->title), $value) : '',
        );
    }

    public function slug(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => str()->slug($value),
        );
    }
}
