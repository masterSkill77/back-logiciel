<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

final class LoginService
{
    public function __construct()
    {
        // Constructor of the class
    }

    public final function loginUser(string $email, string $password): array
    {
        return [];
    }
}
