<?php

namespace Database\Factories;

use App\Models\NavLink;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<NavLink>
 */
class NavLinkFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'route_parameters' => [],
        ];
    }
}
