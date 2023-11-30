<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_login_page(): void
    {
        $response = $this->get('/api/auth/login');

        $response->assertStatus(200);
    }

    public function test_log_user_failed(): void
    {
        $response = $this->post('/api/auth/login', []);
        $response->assertBadRequest();
    }

    public function test_log_user_password_email_failed(): void
    {
        $response = $this->post('/api/auth/login', ['email' => 'jhon.doe@gmail.com', 'password' => '123456789']);
        $response->assertUnauthorized();
    }

    public function test_log_user_ok(): void
    {
        $response = $this->post('/api/auth/login', ['email' => 'koders@koders.mg', 'password' => '123456789']);
        $response->assertOk();
        $response->assertJsonStructure(['user', 'token']);
    }
}
