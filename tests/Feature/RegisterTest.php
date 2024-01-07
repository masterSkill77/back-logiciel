<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_register_user(): void
    { {
            $response = $this->post('/api/auth/register', []);
            $response->assertBadRequest();
        }
    }

    public function test_register_email_exists(): void
    {
        $response = $this->post('/api/auth/register', ['name' => 'test', 'email' => 'test@gmail.mg', 'password' => '12345678']);
        $response->assertBadRequest();
    }

    public function test_register_length_password(): void
    {
        $response = $this->post('/api/auth/register', ['name' => 'test', 'email' => 'test@gmail.mg', 'password' => '123']);

        $response->assertBadRequest();
    }

    public function test_register_ok(): void
    {
        $array = [
            'name' => 'koders',
            'email' => 'koders@koders.com',
            'password' => '123445678',
            'nameAgency' => 'Agence',
            'nameCompany' => 'Company',
            'addressCompany' => 'Street of Company 32 South',
            'phoneAgency' => '+3324561896'
        ];

        $response = $this->post('/api/auth/register', $array);
        $response->assertJsonStructure(['user']);
    }

    public function test_register_ko_unique_name(): void
    {
        $array = [
            'name' => 'koders',
            'email' => 'koders@koders.com',
            'password' => '123445678',
            'nameAgency' => 'Agence',
            'nameCompany' => 'Company',
            'addressCompany' => 'Street of Company 32 South',
            'phoneAgency' => '+3324561896'
        ];

        $response = $this->post('/api/auth/register', $array);
        $response->assertStatus(Response::HTTP_BAD_REQUEST);
    }

    public function test_create_user(): void
    {

        $login = $this->postJson('/api/auth/login', [
            'email' => 'contact@koders.com',
            'password' => '123456789'
        ]);
        $token = $login->json('token');

        $array = [
            'name' => 'agent',
            'email' => 'agent@koders.com',
            'password' => '123456789',
            'role' => 755,
            'agency_id' => 1
        ];

        $response = $this->withHeaders(['Authorization' => 'Bearer' . $token, 'Accept' => 'application/json'])->post('/api/user/create', $array);
        $response->assertJsonStructure(['user']);
    }
}
