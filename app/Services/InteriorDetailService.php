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
    
    public function createInteriorDetail(array $params): int
    {
        if (isset($params['interiorDetail']) && is_array($params['interiorDetail'])) {

            $interior = (new InteriorDetail($params['interiorDetail']));
            $interior->save();
            return $interior->id;
        }
    
        return 0;
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
