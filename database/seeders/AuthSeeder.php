<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Adds a personal access token to the admin user with a consistent value. This
 * ensures that a valid token is always available for testing.
 *
 * Token value: "1|N4H1saeEyTI9ILn48zlUdDta7sjcddrUaZHaPQam"
 */
class AuthSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('personal_access_tokens')->insert([
            'name' => 'Documentation',
            'tokenable_type' => User::class,
            'tokenable_id' => User::role('admin')->first()->id,
            'token' => '4a24737939459e273469254faa54d33d4cc88be8c3d8384ce693b22b3be05825',
            'abilities' => '["*"]',
        ]);
    }
}
