<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_register_user(): void
    {
        {
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
         $response = $this->post('/api/auth/register', ['name'=> 'test','email' => 'test@gmail.mg', 'password' => '123']);
         
        $response->assertBadRequest();  
    }

    public function test_register_ok() : void
 {
    $array= [
        'name'=>'koders', 
        'email'=>'oskar@koders.com',
         'password'=>'123445678', 
         'nameAgency'=>'Agence', 
         'nameCompany'=>'Company',
         'addressCompany' => 'Street of Company 32 South',
         'phoneAgency' => '+3324561896'];
    
    $response = $this->post('/api/auth/register', $array);
    $response->assertJsonStructure(['user']);
 }    

 public function test_create_user() : void
 {
    $token = "1|qjZCtl8sZ3KkK5l6ywgav3ah3Z9QnUsHCulafPvxbee97945";
    $array = [
        'name' => 'agent Tojo',
        'email' => 'tojo@gmail.com',
        'password' => 'password1234', 
        'agency_id' => '1',
    ];
    $response = $this->withHeaders(['Authorization' => 'Bearer' .$token, 'Accept'=> 'application/json' ])->post('/api/user/create', $array);
    $response->assertJsonStructure(['user']);
 }
 
}
