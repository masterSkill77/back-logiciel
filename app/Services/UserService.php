<?php

namespace App\Services;

use App\Enum\Operation;
use App\Enum\Role;
use App\Events\RegisteredAgencyEvent;
use App\Http\Requests\Agency\AgencyRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Jobs\CreatedUserJob;
use App\Models\Agency;
use App\Models\Configuration;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class UserService
{
    public function __construct(public AgencyService $agencyService, protected ConfigurationService $configurationService)
    {
        // Constructor of the class
    }

    public function register(RegisterRequest $registerRequest, AgencyRequest $agencyRequest): array
    {
        $user = $registerRequest->toArray();
        $notHashedPassword = $user['password'];
        $agency = $agencyRequest->toArray();
        $agency = $this->agencyService->store($agency);
        $user['role'] = Role::SUPER_ADMIN;
        $user['password'] = Hash::make($notHashedPassword);
        $user['agency_id'] = $agency->id;
        $user = new User($user);
        $user->save();

        event(new RegisteredAgencyEvent($agency, $notHashedPassword));
        return ['user' => $user];
    }

    public function login(LoginRequest $request): array
    {
        $user = User::with(['agency', 'configurations'])->where('email', $request->email)->first();
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


    public function createAgent(CreateUserRequest $createUserRequest, Agency $agency): void
    {

        try {
            DB::transaction(function () use ($createUserRequest, $agency) {
                $file = $createUserRequest->file('image');
                $photoName = 'agent_' . time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/agent/' . $agency->id, $photoName);

                $user = $createUserRequest->toArray();
                $user['role'] = Role::AGENCE;
                $user['agency_id'] = $agency->id;
                $user['photo_url'] = $photoName;
                $user['password'] = Hash::make($user['password']);
                $user = new User($user);
                $user->save();
                if ($createUserRequest->code_postal) {
                    $allPostalCode = explode(',', $createUserRequest->code_postal);
                    foreach ($allPostalCode as $postalCode) {
                        $newPostalCode = $this->configurationService->createConfiguration($postalCode);
                        $user->configurations()->save($newPostalCode);
                    }
                }

                DB::commit();
                dispatch(new CreatedUserJob($agency, $user, $createUserRequest->password));
                return ['user' => $user];
            });
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }



    public function updateAgent(UpdateUserRequest $updateUserRequest, Agency $agency): void
    {

        try {
            DB::transaction(function () use ($updateUserRequest, $agency) {
                $file = $updateUserRequest->file('image');
                $user = $updateUserRequest->toArray();
                if ($file) {
                    $photoName = 'agent_' . time() . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public/agent/' . $agency->id, $photoName);
                    $user['photo_url'] = $photoName;
                }

                if (isset($user['password'])) {
                    $user['password'] = Hash::make($user['password']);
                }
                $userQuery = User::with('configurations')->where('id', $user['user_id']);

                unset($user['code_postal']);
                unset($user['user_id']);
                unset($user['image']);
                $userQuery->update($user);
                $user = $userQuery->first();
                if (isset($updateUserRequest->code_postal)) {
                    $allPostalCode = explode(',', $updateUserRequest->code_postal);
                    Configuration::where('entity_id', $user->id)->where('entity_type', \App\Models\User::class)->delete();
                    foreach ($allPostalCode as $postalCode) {
                        $newPostalCode = $this->configurationService->createConfiguration($postalCode, $user->id);
                        $user->configurations()->save($newPostalCode);
                    }
                }

                DB::commit();
                dispatch(new CreatedUserJob($agency, $user, $updateUserRequest->password, Operation::UPDATED));
                return ['user' => $user];
            });
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }


    public  function getAllAgents(): array
    {
        $user = User::where('role', Role::AGENCE)->get();
        return ['user' => $user];
    }

    public function checkUserAvailability(string $nameOrEmail): bool
    {
        return User::withTrashed()->where('name', $nameOrEmail)->orWhere('email', $nameOrEmail)->first() ? false : true;
    }

    public function removeUser(User $user)
    {
        return User::where('id', $user->id)->delete();
    }

    public function getAgent(int $userId)
    {
        return User::with(['configurations', 'biens', 'contacts'])->where('id', $userId)->first();
    }
}
