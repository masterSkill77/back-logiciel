<?php

namespace App\Services;

use App\Enum\Role;
use App\Events\RegisteredAgencyEvent;
use App\Http\Requests\Agency\AgencyRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\User\CreateUserRequest;
use App\Models\User;
use Exception;
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

    public function register(RegisterRequest $registerRequest, AgencyRequest $agencyRequest): array
    {
        $user = $registerRequest->toArray();
        $agency = $agencyRequest->toArray();
        $agency = $this->agencyService->store($agency);
        $user['role'] = Role::SUPER_ADMIN;
        $user['password'] = Hash::make($user['password']);
        $user['agency_id'] = $agency->id;
        $user = new User($user);
        $user->save();

        event(new RegisteredAgencyEvent($agency));
        return ['user' => $user];
    }

    public function login(LoginRequest $request): array
    {
        $user = User::with('agency')->where('email', $request->email)->first();
        if (!$user) {
            throw new UnauthorizedHttpException('', "Les accès que vous avez fournis sont incorectes", null, 401);
        }
        if (!Hash::check($request->password, $user->password)) {
            throw new BadRequestHttpException('Les accès que vous avez fournis sont incorectes', null, 401);
        }
        if (!$user->email_verified_at) {
            throw new Exception("Ce compte n'est pas encore activé, veuillez confirmer votre mail", 403);
        }
        $token = $user->createToken('token')->plainTextToken;
        return ['user' => $user, 'token' => $token];
    }


    public function createAgent(CreateUserRequest $createUserRequest): array
    {
        $user = $createUserRequest->toArray();
        $user['role'] = Role::AGENCE;
        $user['password'] = Hash::make($user['password']);
        $user = new User($user);
        $user->save();
        return ['user' => $user];
    }
}
