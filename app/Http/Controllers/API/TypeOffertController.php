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

    /**
     * list d'offert
     */
    public function index() : JsonResponse
    {
        $list = $this->typeOffert->findAll();

        return response()->json($list);
    }

    /**
     * get identification d'offert
     */
    public function findById(int $typeOffert) :JsonResponse
    {
        $typeOffertId = $this->typeOffert->getById($typeOffert);
        if(!$typeOffertId) {
            throw new NotFoundHttpException("type offert with `$typeOffert` not found");
        }

        return response()->json($typeOffertId);
    }

    /**
     * get list de la classification par identification du type d'offert
     */
    public function getClassificationByIdTypeOffert(int $typeOffert) :JsonResponse
    {
        $typeOffertId = $this->typeOffert->getClassificationByIdTypeOffert($typeOffert);
        if(!$typeOffertId) {
            throw new NotFoundHttpException("type offert with `$typeOffert` not found");
        }

        return response()->json($typeOffertId);
    }
}