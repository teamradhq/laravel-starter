<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title,
            'content' => fake()->paragraphs(3, true),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory()->createOne()->id,
            'published' => fake()->boolean(80),
            'publish_at' => fake()->dateTimeBetween('-1 year', '+1 year'),
        ];
    }
}
