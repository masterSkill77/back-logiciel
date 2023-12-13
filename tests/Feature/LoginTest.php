<?php

namespace Tests\Feature;

use Database\Seeders\AgencySeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */


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
        $this->seed(AgencySeeder::class);
        $this->seed(UserSeeder::class);   
        $response = $this->post('/api/auth/login', ['email' => 'contact@koders.com', 'password' => '123456789']);
        $response->assertJsonStructure(['user', 'token']);
        $response->assertOk();
    }
}
