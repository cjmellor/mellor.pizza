<?php

namespace Database\Factories;

use App\Enums\PostStatus;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $title = $this->faker->sentence();

        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->sentence(),
            'post_content' => $this->faker->text(),
            'is_published' => PostStatus::Draft,
        ];
    }

    public function published(): self
    {
        return $this->state(fn () => [
            'is_published' => PostStatus::Published,
        ]);
    }

    public function unpublished(): self
    {
        return $this->state(fn () => [
            'is_published' => PostStatus::Draft,
        ]);
    }
}
