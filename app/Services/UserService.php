<?php

namespace App\Services;

use App\Enum\Role;
use App\Http\Requests\Agency\AgencyRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\User\CreateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

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
       $agency = $this->agencyService->store($agency);
        $user['role'] = Role::SUPER_ADMIN;
        $user['password'] = Hash::make($user['password']);
        $user['agency_id'] = $agency->id;
        $user = new User($user);
        $user->save();
       
        return $user;
    }

    public function login(LoginRequest $request) : array
    {
        $user = User::where('email', $request->email)->first();
        if(!$user){
            throw new UnauthorizedHttpException('Bad password');
        }
        if (!Hash::check($request->password, $user->password)) {
           throw new BadRequestHttpException('Bad password');
        }
        $token = $user->createToken('token')->plainTextToken;
        return ['user'=>$user, 'token'=> $token];
    }
    

    public function createAgent(CreateUserRequest $createUserRequest): User
    {
        $user = $createUserRequest->toArray();
        $user['role'] = Role::AGENCE;
        $user['password'] = Hash::make($user['password']);
        $user = new User($user);
        $user->save();
        return $user;
    }
}
