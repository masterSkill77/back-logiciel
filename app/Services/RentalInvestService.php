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
    public function createRentalInvest(array $params): int
    {
        if(isset($params['rentalInvests']) && is_array($params['rentalInvests'])) {
            $rentalInvest = (new RentalInvest($params['rentalInvests']));
            $rentalInvest->save();

            return $rentalInvest->id_rental_invest;
        }
            return 0;
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
