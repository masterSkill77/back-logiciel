<?php

namespace App\Http\Controllers\API;

use App\Filters\EstimationFilters;
use App\Http\Controllers\Controller;
use App\Http\Requests\Estimation\CreateEstimationRequest;
use App\Services\AgencyService;
use App\Services\EstimationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EstimationController extends Controller
{
    public function __construct(protected EstimationService $estimationService)
    {
    }

    public function createEstimation(CreateEstimationRequest $createEstimationRequest): JsonResponse
    {
        $user = Auth()->user();
        $estimation = $this->estimationService->createEstimation($createEstimationRequest->toArray(), $user->agency_id);
        return response()->json($estimation, Response::HTTP_CREATED);
    }

    public function getEstimations(Request $request, EstimationFilters $estimationFilters)
    {
        $user = Auth::user();
        $agency = (new AgencyService)->getById($user->agency_id);
        $estimations = $this->estimationService->getEstimations($agency, $estimationFilters);

        return response()->json($estimations, 200);
    }

    public function affectAgentToEstimation(Request $request)
    {
        $userId = $request->input('user_id');
        $estimationId = $request->input('estimation_id');
        $this->estimationService->affectAgentToEstimation($userId, $estimationId);

        return response()->json([]);
    }

    public function getDistinctCP()
    {
        $agencyId = Auth::user()->agency_id;
        $postalCodes = $this->estimationService->getDistinctCP($agencyId);

        return response()->json($postalCodes);
    }
}
