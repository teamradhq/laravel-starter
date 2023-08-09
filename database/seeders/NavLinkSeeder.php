<?php

namespace Database\Seeders;

use App\Models\NavLink;
use Illuminate\Database\Seeder;

class NavLinkSeeder extends Seeder
{
    public function run(): void
    {
        $links = [
            ['title' => 'Home', 'url' => '/'],
            ['title' => 'Dashboard', 'route_name' => 'dashboard', 'is_auth_link_only' => true],
            ['title' => 'Logout', 'route_name' => 'logout', 'is_auth_link_only' => true],
            ['title' => 'Login', 'route_name' => 'login', 'is_guest_link_only' => true],
        ];

        collect($links)->each(static function (array $link, int $index): void {
            $navLink = new NavLink([
                ...$link,
                //                'order' => $index + 1,
            ]);

            $navLink->save();
        });
    }
}
