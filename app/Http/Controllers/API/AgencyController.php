<?php

namespace App\Http\Controllers\API;

use App\Enum\Role;
use App\Models\Agency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AgencyService;
use App\Services\ConfigurationService;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $agencyService = new AgencyService();
        $userService = new UserService($agencyService, new ConfigurationService);
        $user = Auth::user();

        if ($user->role == Role::SUPER_ADMIN->value)
            $config = $agencyService->getById($user->agency_id);
        else {
            $config = $userService->getAgent($user->id);
        }
        return response()->json($config);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agency $agency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agency $agency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agency $agency)
    {
        //
    }
}
