<?php

namespace App\Services;

use App\Filters\EstimationFilters;
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

    public function getEstimations(Agency $agency, EstimationFilters $estimationFilters)
    {
        return Estimation::filter($estimationFilters)->agency($agency)->with('agency')->paginate(2);
    }
}
