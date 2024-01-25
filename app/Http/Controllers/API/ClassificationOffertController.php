<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\ClassificationOffertService;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\JsonResponse;

class ClassificationOffertController extends Controller
{
    public function __construct( public ClassificationOffertService $classificationService)
    {
        
    }

    /**
     * return list des classification offert
     */
    public function index() :JsonResponse
    {
        $list = $this->classificationService->findAll();

        return response()->json($list);
    }

    /**
     * return de get classification offert
     */
    public function getById(int $classificationOffert): JsonResponse
    {
        $classificationOffertId = $this->classificationService->getById($classificationOffert);
        if(!$classificationOffertId) {
            throw new NotFoundHttpException("classificationOffert with `$classificationOffert` not found");
        }

        return response()->json($classificationOffertId);
    }
}