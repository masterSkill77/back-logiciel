<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Models\User;
use App\Services\AgencyService;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller

{
    public function __construct(public UserService $userService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $createRequest): JsonResponse
    {
        $admin = Auth::user();
        $agency = (new AgencyService)->getById($admin->agency_id);
        $user = $this->userService->createAgent($createRequest, $agency);
        return response()->json($user);
    }

    /**
     * Check availability of name or email
     */
    public function checkAvailability(Request $request)
    {
        $isAvailable = $this->userService->checkUserAvailability($request->query('search'));

        return response()->json($isAvailable);
    }


    public function getAllAgents(): JsonResponse
    {
        $agents = $this->userService->getAllAgents();
        return response()->json($agents, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
