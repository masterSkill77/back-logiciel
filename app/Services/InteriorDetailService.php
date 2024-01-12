<?php

namespace App\Services;

use App\Models\InteriorDetail;
use Illuminate\Database\Eloquent\Collection;

class InteriorDetailService
{
    public function __construct()
    {
        // Constructor of the class
    }
    
    public function createInteriorDetail(array $params): InteriorDetail
    {
        $interior = (new InteriorDetail($params));
        $interior->save();
        return $interior;
    }

    /**
     * Update an InteriorDetail row based on infoId
     * @param \App\Models\InteriorDetail $interior
     * @param array $params
     * @return \App\Models\InteriorDetail
     */

    public function updateInteriorDetail(InteriorDetail $interior, array $params): InteriorDetail
    {
        $interior->update($params);
        return $interior;
    }


    public function getInteriorDetail() : Collection
    {
        return InteriorDetail::all();
    }
}
