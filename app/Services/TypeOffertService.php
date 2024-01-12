<?php

namespace App\Services;

use App\Models\TypeOffert;

class TypeOffertService
{
    public function __construct()
    {
        // Constructor of the class
    }

    public function createTypeoffert(array $params) :TypeOffert
    {
        $typeoffert = (new TypeOffert($params));
        $typeoffert->save();
        return $typeoffert;
    }


    public function updateTypeOffert(TypeOffert $typeOffert, array $params): TypeOffert
    {
        $typeOffert->update($params);
        return $typeOffert;
    }

}
