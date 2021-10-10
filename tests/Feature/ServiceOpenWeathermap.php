<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceOpenWeathermap extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_if_you_try_to_order_there_must_be_a_200_http_response()
    {
        $response = $this->get('/getforecasting/andradina');
        $response->assertStatus(200);
    }
}
