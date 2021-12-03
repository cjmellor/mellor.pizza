<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        Post::factory()
            ->count(count: 20)
            ->for(User::factory(), relationship: 'author')
            ->for(Category::factory())
            ->has(Tag::factory())
            ->state(new Sequence(fn () => ['is_published' => rand(0, 1)]))
            ->create(['user_id' => 1]);
    }
}
