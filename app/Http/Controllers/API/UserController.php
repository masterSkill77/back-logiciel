<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller

{
    public function __construct(public UserService $userService ){

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
    public function store(CreateUserRequest $createRequest) : JsonResponse
    {
        $user = $this->userService->createAgent($createRequest);
        return response()->json($user);
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
