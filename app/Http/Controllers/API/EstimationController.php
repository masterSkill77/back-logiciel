<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Estimation\CreateEstimationRequest;
use App\Services\EstimationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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
}
