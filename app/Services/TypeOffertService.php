<?php

namespace App\Services;

use App\Models\TypeOffert;
use Illuminate\Database\Eloquent\Collection;

class TypeOffertService
{
    public function __construct()
    {
        // Constructor of the class
    }
    public function createTypeOffert(array $params): TypeOffert
    {
        $type = (new TypeOffert($params));
        $type->save();
        return $type;
    }

    /**
     * Update an TypeOffert row based on infoId
     * @param \App\Models\TypeOffert $type
     * @param array $params
     * @return \App\Models\TypeOffert
     */

    public function updateTypeOffert(TypeOffert $type, array $params): TypeOffert
    {
        $type->update($params);
        return $type;
    }

    public function findAll() :Collection
    {
        return TypeOffert::all();
    }

    public function getById(int $typeOffert) :?TypeOffert
    {
        return TypeOffert::find($typeOffert);
    }

    public function getClassificationByIdTypeOffert(int $typeOffert) :TypeOffert
    {
        return TypeOffert::where('id', $typeOffert)->with(['classificationOfferts'])->first();
    }
}
