<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name;

        return [
            'name' => $name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'slug' => Str::slug($name),
            'about' => $this->faker->text(),
            'remember_token' => Str::random(10),
        ];
    }

    public function avatar(): UserFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'avatar' => sprintf('https://www.gravatar.com/avatar/%s', md5(strtolower($this->faker->email))),
            ];
        });
    }
}
