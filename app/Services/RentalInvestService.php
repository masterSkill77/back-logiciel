<?php

namespace App\Services;

use App\Models\RentalInvest;
use Illuminate\Database\Eloquent\Collection;

class RentalInvestService
{
    public function __construct()
    {
        // Constructor of the class
    }
    public function createRentalInvest(array $params): RentalInvest
    {
        $rentalInvest = (new RentalInvest($params));
        $rentalInvest->save();
        return $rentalInvest;
    }

    /**
     * Update an RentalInvest row based on infoId
     * @param \App\Models\RentalInvest $rentalInvest
     * @param array $params
     * @return \App\Models\RentalInvest
     */

    public function updateRentalInvest(RentalInvest $rentalInvest, array $params): RentalInvest
    {
        $rentalInvest->update($params);
        return $rentalInvest;
    }


    public function getRentalInvest() : Collection
    {
        return RentalInvest::all();
    }
}
