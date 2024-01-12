<?php

namespace App\Services;

use App\Models\Sector;

class SectorService
{
    public function __construct()
    {
        // Constructor of the class
    }

    public function createSector(array $params): Sector
    {
        $sector = (new Sector($params));
        $sector->save();
        return $sector;
    }

    /**
     * Update an Sector row based on infoId
     * @param \App\Models\Sector $Sector
     * @param array $params
     * @return \App\Models\Sector
     */

    public function updateSector(Sector $sector, array $params): Sector
    {
        $sector->update($params);
        return $sector;
    }
}
