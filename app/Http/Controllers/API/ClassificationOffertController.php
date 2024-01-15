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

    public function index() :JsonResponse
    {
        $list = $this->classificationService->findAll();

        return response()->json($list);
    }

    public function getById(int $classificationOffert): JsonResponse
    {
        $classificationOffertId = $this->classificationService->getById($classificationOffert);
        if(!$classificationOffertId) {
            throw new NotFoundHttpException("classificationOffert with `$classificationOffertId` not found");
        }

        return response()->json($classificationOffertId);
    }
}