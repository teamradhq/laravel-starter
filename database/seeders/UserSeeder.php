<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    protected UserFactory $factory;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->factory = User::factory();

        if (Role::all()->isEmpty()) {
            $this->call(RoleSeeder::class);
        }

        $this->factory->createOne([
            'name' => 'admin',
            'email' => 'admin@test.com',
        ])->roles()->attach(Role::where('name', 'admin')->first());

        $role = Role::where('name', 'user')->first();
        $this->factory->count(10)
            ->create()
            ->each(static fn ($user) => $user->roles()->attach($role));
    }
}
