<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $title = $this->faker->sentence;

        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->sentence,
            'post_content' => $this->faker->text,
            'is_published' => false,
            'is_markdown' => false,
        ];
    }

    public function published(): PostFactory
    {
        return $this->state(fn () => [
            'is_published' => true,
        ]);
    }

    public function unpublished(): PostFactory
    {
        return $this->state(fn () => [
            'is_published' => false,
        ]);
    }

    public function usesMarkdown(): PostFactory
    {
        return $this->state(fn () => [
            'is_markdown' => true,
        ]);
    }
}
