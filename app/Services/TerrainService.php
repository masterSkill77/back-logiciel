<?php

namespace App\Services;

use App\Models\Terrain;

class TerrainService
{
    public function __construct()
    {
        // Constructor of the class
    }

    public function createTerrain(array $params): Terrain
    {
        $terrain = (new Terrain($params));
        $terrain->save();
        return $terrain;
    }

    /**
     * Update an Terrain row based on infoId
     * @param \App\Models\Terrain $terrain
     * @param array $params
     * @return \App\Models\Terrain
     */

    public function updateTerrain(Terrain $terrain, array $params): Terrain
    {
        $Terrain->update($params);
        return $Terrain;
    }
}