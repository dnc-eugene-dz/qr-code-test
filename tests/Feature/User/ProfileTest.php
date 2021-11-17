<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    /**
     * Test getting user profile
     *
     * @return void
     */
    public function test_user_info()
    {
        $this->actingAs(
            User::factory()->create()
        );
        $response = $this->getJson(route('user.data'));
        $response->assertOk()->assertJsonStructure([
            'name',
            'email'
        ]);
    }
}
