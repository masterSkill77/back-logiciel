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
        $data['address_bien'] = 'Text';
        $data['cp_bien'] = '35025';
        $data['ville_bien'] = 'Paris';
        $estimation =  new Estimation($data);
        $estimation->save();
        return $estimation;
    }

    public function getEstimations(Agency $agency, EstimationFilters $estimationFilters)
    {
        return Estimation::filter($estimationFilters)->agency($agency)->with(['agency', 'user'])->orderBy('created_at', 'DESC')->paginate(10);
    }
    /**
     * Affect an estimation to a specific user based on estimation uuid and the user id
     * @param int $userIdTo ( the user to attribute the estimation )
     * @param $estimationId ( the estimation ID)
     */
    public function affectAgentToEstimation(int $userIdTo, $estimationId): void
    {
        $estimation = Estimation::where('id', $estimationId)->first();
        $estimation->user_id = $userIdTo;
        $estimation->save();
    }
}
