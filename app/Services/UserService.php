<?php

namespace App\Services;

use App\Http\Requests\Agency\AgencyRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function __construct(public AgencyService $agencyService)
    {
        // Constructor of the class
    }

    public function register(RegisterRequest $registerRequest, AgencyRequest $agencyRequest) 
    {
        $user = $registerRequest->toArray();
        $agency = $agencyRequest->toArray();
        $user['password'] = Hash::make($user['password']);
        $user = new User($user);
        $user->save();
        $this->agencyService->store($agency);
        return $user;
    }
}
