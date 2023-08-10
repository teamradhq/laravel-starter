<?php

namespace Tests\Feature\Http\Middleware;

use App\Http\Middleware\AdminMiddleware;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class AdminMiddlewareTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(RoleSeeder::class);
    }

    public static function userProvider(): array
    {
        return [
            'admin' => ['admin', 200],
            'user' => ['user', 404],
        ];
    }

    /**
     * Only a user with admin role should be allowed to access the route.
     *
     * @dataProvider userProvider
     */
    public function test_only_admins_can_proceed(string $role, int $expectedStatus): void
    {
        $user = User::factory()->createOne();
        $user->assignRole(Role::where('name', $role)->first());

        $this->actingAs($user);

        $response = app(AdminMiddleware::class)->handle(
            Request::create('/'),
            fn ($request) => response($request->all()),
        );

        $this->assertEquals($expectedStatus, $response->getStatusCode());
    }
}
