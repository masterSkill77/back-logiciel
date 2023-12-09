<?php

namespace App\Services;

use App\Enum\Role;
use App\Http\Requests\Agency\AgencyRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserService
{
    public function __construct(public AgencyService $agencyService)
    {
        // Constructor of the class
    }

    public function register(RegisterRequest $registerRequest, AgencyRequest $agencyRequest) : User
    {
        $user = $registerRequest->toArray();
        $agency = $agencyRequest->toArray();
        $user['role'] = Role::SUPER_ADMIN;
        $user['password'] = Hash::make($user['password']);
        $user = new User($user);
        $user->save();
        $agency['user_id'] = $user->id;
        $this->agencyService->store($agency);
        return $user;
    }

    public function login(LoginRequest $request) : array
    {
        $user = User::where('email', $request->email)->first();
        if(!$user){
            throw new NotFoundHttpException("User with`$request->email` not found");
        }
        if (!Hash::check($request->password, $user->password)) {
           throw new BadRequestHttpException('Bad password');
        }
        $token = $user->createToken('token')->plainTextToken;
        return ['user'=>$user, 'token'=> $token];
    }
}
