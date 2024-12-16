<?php

namespace Tests\Feature;

use App\Models\Account;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $user = Account::first();
        $response = $this->actingAs($user)->get('/dang-nhap');

        $response->assertStatus(200);
    }
}
