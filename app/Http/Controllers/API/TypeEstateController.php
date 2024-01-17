<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\TypeEstateService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class TypeEstateController extends Controller
{
    public function __construct( public TypeEstateService $typeEstate)
    {
        
    }

    public function index() :JsonResponse
    {
        $list = $this->typeEstate->findAll();
        return response()->json($list);
    }

    public function getById(int $typeEstate): JsonResponse
    {
        $typeEstateId= $this->typeEstate->getById($typeEstate);
        if(!$typeEstateId) {
            throw new NotFoundHttpException("type bien with `$typeEstateId` not found");
        }

        return response()->json($typeEstateId);
    }

    public function getClassificationByIdTypeEstate(int $typeEstate) :JsonResponse
    {
        $typeEstateId = $this->typeEstate->getClassificationByIdTypeEstate($typeEstate);
        if(!$typeEstateId) {
            throw new NotFoundHttpException("type bien with `$typeEstateId` not found");
        }

        return response()->json($typeEstateId);
    }
}