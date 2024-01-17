<?php

namespace App\Services;

use App\Models\Terrain;

class TerrainService
{
    public function __construct()
    {
        // Constructor of the class
    }

    public function createTerrain(array $params): int
    {
        if (isset($params['terrain']) && is_array($params['terrain'])) {
            $terrain = new Terrain($params['terrain']);
            $terrain->save();
            return $terrain->id;
        }
    
        return 0;
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