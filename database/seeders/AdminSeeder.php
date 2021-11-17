<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $name = 'Chris Mellor';

        User::factory()->createOne([
            'name' => $name,
            'email' => 'cmellor@gmail.com',
            'password' => Hash::make(value: 'password'),
            'slug' => Str::slug($name),
            'about' => 'I am developer',
            'social_github' => 'cjmellor',
            'social_twitter' => 'cmellor',
        ]);
    }
}
