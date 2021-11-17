<?php

namespace Tests\Feature\QRCode;

use App\Models\User;
use Illuminate\Support\Str;
use Tests\TestCase;

class GenerateTest extends TestCase
{
    /**
     * User can generate QR code.
     *
     * @return void
     */
    public function test_user_can_generate_qr()
    {
        $this->actingAs(
            User::factory()->create()
        );
        $response = $this->post(route('qr.generate'), $this->getPayload());

        $response->assertOk();
    }

    /**
     * Guest can't generate QR code.
     *
     * @return void
     */
    public function test_guest_can_not_generate_qr()
    {
        $response = $this->postJson(route('qr.generate'), $this->getPayload());

        $response->assertStatus(401);
    }

    /**
     * Test validation for QR code generation.
     *
     * @return void
     */
    public function test_validation_generate_qr()
    {
        $this->actingAs(
            User::factory()->create()
        );

        $response = $this->postJson(route('qr.generate'), $this->getInvalidPayload());

        $response->assertStatus(422)->assertJsonValidationErrors(
            [
                'content',
                'size',
                'fill_color',
                'background_color'
            ]
        );
    }

    protected function getInvalidPayload(): array
    {
        return [
            'content' => '',
            'size'  => 0,
            'fill_color' => '',
            'background_color' => '',
        ];
    }

    protected function getPayload(): array
    {
        return [
            'content' => Str::random(10),
            'size'  => 100,
            'fill_color' => [
                'r' => rand(0,255),
                'g' => rand(0,255),
                'b' => rand(0,255),
                'a' => 1
            ],
            'background_color' => [
                'r' => rand(0,255),
                'g' => rand(0,255),
                'b' => rand(0,255),
                'a' => 1
            ],
        ];
    }
}
