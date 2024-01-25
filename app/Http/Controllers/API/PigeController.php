<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Services\PigeService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PigeController extends Controller
{
    public function __construct(protected PigeService $pigeService)
    {
    }

    /**
     * Get all pige by agency, the agency will get info by specifying its API KEY
     * @param \App\Models\Agency $agency
     * @return JsonResponse
     */
    public function getPigesByAgence(Request $request, Agency $agency): JsonResponse
    {
        if (!$agency->pige_online_key) {
            return response()->json(['error' => 'NO_APP_KEY_FOUND', 'message' => 'No application key available for this agency'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $piges = $this->pigeService->getPiges($agency);
        return response()->json(($piges));
    }
}
