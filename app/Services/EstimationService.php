<?php

namespace App\Services;

use App\Models\Agency;
use App\Models\Estimation;

class EstimationService
{
    public function __construct()
    {
        // Constructor of the class
    }

    public function createEstimation(array $data, int $agencyId): Estimation
    {
        $data['agency_id'] = $agencyId;
        $estimation =  new Estimation($data);
        $estimation->save();
        return $estimation;
    }
}
