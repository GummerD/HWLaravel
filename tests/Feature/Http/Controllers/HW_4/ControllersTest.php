<?php

namespace Tests\Feature\Http\Controllers\HW_4;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ControllersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexSuccessStatusFeedback(): void
    {
        $response = $this->get(route('feedback.index'));

        $response->assertStatus(200);
    }

    public function testIndexSuccessStatusOrderForm(): void
    {
        $response = $this->get(route('order_form.index'));

        $response->assertStatus(200);
    }

    public function testStoregSaccessStatusFeedback(): void
    {
        
        $response = $this->post(route('feedback.store'));

        $response->assertStatus(302);
    }

    public function testStoregSaccessStatusOrderForm(): void
    {
        $response = $this->post(route('order_form.store'));

        $response->assertStatus(200);
    }

    public function testValidateTitleData(): void
    {
        $data = [
            'username' => \fake()->userName(),
            'description' => \fake()->text(100)
        ];

        $response = $this->post(route('feedback.store'), $data);
        $response->assertStatus(200);

    }
}
