<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_assigns_multiple_roles_and_hashes_password(): void
    {
        $this->post('/register', ['name' => 'Farmer', 'email' => 'farmer@example.test', 'password' => 'StrongPass123', 'password_confirmation' => 'StrongPass123', 'roles' => ['farmer', 'buyer']])->assertRedirect('/dashboard');
        $user = User::first();
        $this->assertAuthenticatedAs($user);
        $this->assertTrue($user->hasRole('farmer'));
        $this->assertTrue($user->hasRole('buyer'));
        $this->assertNotEquals('StrongPass123', $user->password);
    }

    public function test_privileged_roles_cannot_be_self_assigned(): void
    {
        foreach (['administrator', 'price_contributor', 'veterinarian', 'insemination_agent'] as $role) {
            $this->post('/register', ['name' => 'Test', 'email' => 'test@example.test', 'password' => 'StrongPass123', 'password_confirmation' => 'StrongPass123', 'roles' => ['farmer', $role]])->assertSessionHasErrors('roles.1');
        }
        $this->assertDatabaseCount('users', 0);
    }

    public function test_dashboard_requires_authentication(): void
    {
        $this->get('/dashboard')->assertRedirect('/login');
    }

    public function test_login_and_logout(): void
    {
        $user = User::factory()->create(['password' => 'StrongPass123']);
        $this->post('/login', ['email' => $user->email, 'password' => 'incorrect'])->assertSessionHasErrors('email');
        $this->assertGuest();
        $this->post('/login', ['email' => $user->email, 'password' => 'StrongPass123'])->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
        $this->get('/dashboard')->assertOk()->assertSee($user->name);
        $this->post('/logout')->assertRedirect('/');
        $this->assertGuest();
    }

    public function test_login_is_rate_limited(): void
    {
        for ($i = 0; $i < 5; $i++) {
            $this->post('/login', ['email' => 'missing@example.test', 'password' => 'wrong']);
        }
        $this->post('/login', ['email' => 'missing@example.test', 'password' => 'wrong'])->assertStatus(429);
    }
}
