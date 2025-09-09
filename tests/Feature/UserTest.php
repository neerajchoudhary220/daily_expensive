<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase,WithFaker;

    public function test_guest_is_redirected_to_login(): void
    {
        $this->get(route('dashboard'))
            ->assertRedirect(route('login')); // default behaviour
    }

    public function test_logout(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user)->get(route('logout'))->assertRedirect('/');
    }

    public function test_auth_login(): void
    {
        $password = 'test@123';
        $user = User::factory()->create(['password' => $password]);
        $login_input = [
            'username' => $user->username,
            'password' => $password,
            'remember' => $this->faker()->boolean,
        ];
        $this->post(route('login'), $login_input)->assertRedirect(route('dashboard'));

    }
}
