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

    /**
     * list de la classification de bien
     * return json
     */
    public function index(): JsonResponse
    {
        $list = $this->classificationEstate->findAll();

        return response()->json($list);
    }

    /**
     * get du classification du bien
     * return json
     */
    public function getById(int $classificationEstate): JsonResponse
    {
        $classificationEstateId = $this->classificationEstate->getById($classificationEstate);
        if(!$classificationEstateId) {
            throw new NotFoundHttpException("classification de bien with `$classificationEstate` not found");
        }

        return response()->json($classificationEstateId);
    }
}