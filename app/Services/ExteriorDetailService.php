<?php

namespace App\Services;

use App\Models\ExteriorDetail;
use Illuminate\Database\Eloquent\Collection;

class ExteriorDetailService
{
    public function __construct()
    {
        // Constructor of the class
    }
    public function createExteriorDetail(array $params): int
    {
        if(isset($params['exteriorDetail']) && is_array($params['exteriorDetail'])) {
            $exterior = (new ExteriorDetail($params['exteriorDetail']));
            $exterior->save();

            return $exterior->id;
        }
        return 0;
    }

    /**
     * Update an ExteriorDetail row based on infoId
     * @param \App\Models\ExteriorDetail $exterior
     * @param array $params
     * @return \App\Models\ExteriorDetail
     */

    public function updateExteriorDetail(ExteriorDetail $exterior, array $params): ExteriorDetail
    {
        $exterior->update($params);
        return $exterior;
    }


    public function getExteriorDetail() : Collection
    {
        return ExteriorDetail::all();
    }
}
