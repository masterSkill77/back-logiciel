<?php

namespace Tests\Unit;

use App\Services\LoginService;
use PHPUnit\Framework\TestCase;


class LoginServiceTest extends TestCase
{
    protected LoginService $loginService;
    public function setup(): void
    {
        $this->loginService = new LoginService();
    }
    // Test for login user
    public function test_login_user_failed(): void
    {

        $email = 'clairmont.rajaonarison@gmail.com';
        $password = '123456789';

        $result = $this->loginService->loginUser($email, $password);

        $this->assertArrayHasKey('user', $result);
        $this->assertArrayHasKey('token', $result);
    }
}
