<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\ClassificationEstateService;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\JsonResponse;

class ClassificationEstateController extends Controller
{
    public function __construct( public ClassificationEstateService $classificationEstate)
    {
        
    }

    public function index(): JsonResponse
    {
        $list = $this->classificationEstate->findAll();

        return response()->json($list);
    }

    public function getById(int $classificationEstate): JsonResponse
    {
        $classificationEstateId = $this->classificationEstate->getById($classificationEstate);
        if(!$classificationEstateId) {
            throw new NotFoundHttpException("classification de bien with `$classificationEstateId` not found");
        }

        return response()->json($classificationEstateId);
    }
}