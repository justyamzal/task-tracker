<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\AdminUserSeeder;

class AuthLoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_login_and_get_token(): void
    {
        $this->seed(AdminUserSeeder::class);

        $res = $this->postJson('/api/auth/login', [
            'email' => 'admin@example.com',
            'password' => 'password123',
        ]);

        $res->assertStatus(200)
            ->assertJsonStructure(['token','user' => ['id','name','email','is_admin']]);
    }
}
