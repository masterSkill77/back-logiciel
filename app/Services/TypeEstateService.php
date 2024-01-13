<?php

namespace App\Services;

use App\Models\TypeEstate;

class TypeEstateService
{
    public function __construct()
    {
        // Constructor of the class
    }
    public function createTypeEstate(array $params): TypeEstate
    {
        $type = (new TypeEstate($params));
        $type->save();
        return $type;
    }

    /**
     * Update an TypeEstate row based on infoId
     * @param \App\Models\TypeEstate $type
     * @param array $params
     * @return \App\Models\TypeEstate
     */

    public function updateTypeEstate(TypeEstate $type, array $params): TypeEstate
    {
        $type->update($params);
        return $type;
    }
}
