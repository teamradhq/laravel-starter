<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        User::all()->each(static function (User $user): void {
            Post::factory()->count(fake()->numberBetween(0, 10))->create(['user_id' => $user->id]);
        });
    }
}
