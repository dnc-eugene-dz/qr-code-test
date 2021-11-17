<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register()
    {
        $password = Str::random(10);
        $response = $this->post(route('register'), [
            'name'                 => $this->faker->name,
            'email'                => $this->faker->email,
            'password'             => $password,
            'password_confirmation' => $password,
        ]);

        $response->assertOk()->assertJson([
            'message' => 'Success'
        ]);
        $this->assertAuthenticated();
    }
}
