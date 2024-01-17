<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\TypeOffertService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class TypeOffertController extends Controller
{

    public function __construct( public TypeOffertService $typeOffert)
    {
        
    }

    public function index() : JsonResponse
    {
        $list = $this->typeOffert->findAll();

        return response()->json($list);
    }

    public function findById(int $typeOffert) :JsonResponse
    {
        $typeOffertId = $this->typeOffert->getById($typeOffert);
        if(!$typeOffertId) {
            throw new NotFoundHttpException("type offert with `$typeOffertId` not found");
        }

        return response()->json($typeOffertId);
    }

    public function getClassificationByIdTypeOffert(int $typeOffert) :JsonResponse
    {
        $typeOffertId = $this->typeOffert->getClassificationByIdTypeOffert($typeOffert);
        if(!$typeOffertId) {
            throw new NotFoundHttpException("type offert with `$typeOffertId` not found");
        }

        return response()->json($typeOffertId);
    }
}