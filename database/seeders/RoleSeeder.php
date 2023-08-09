<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        if (Role::all()->isNotEmpty()) {
            $this->command->warn('  Not Seeding! Roles already exist.');
            return;
        }

        collect(['admin','user'])->each(static fn ($name) => Role::create(compact('name')));
    }
}
