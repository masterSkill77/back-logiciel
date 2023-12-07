<?php

namespace App\Http\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Agency\AgencyRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct(public UserService $userService)
    {
        
    }

    public function register(RegisterRequest $registerRequest, AgencyRequest $agencyRequest ) :JsonResponse
    {
        $register = $this->userService->register($registerRequest, $agencyRequest);
        return response()->json([
            $register
        ]);
    }
}
