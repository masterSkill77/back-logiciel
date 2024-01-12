<?php

namespace App\Services;

use App\Models\InfoCopropriete;
use Illuminate\Database\Eloquent\Collection;

class InfoCoproprieteService
{
    public function __construct()
    {
        // Constructor of the class
    }
    public function createInfoCopropriete(array $params): InfoCopropriete
    {
        $copropriete = (new InfoCopropriete($params));
        $copropriete->save();
        return $copropriete;
    }

    /**
     * Update an InfoCopropriete row based on infoId
     * @param \App\Models\InfoCopropriete $copropriete
     * @param array $params
     * @return \App\Models\InfoCopropriete
     */

    public function updateInfoCopropriete(InfoCopropriete $copropriete, array $params): InfoCopropriete
    {
        $copropriete->update($params);
        return $copropriete;
    }


    public function getInfoCopropriete() : Collection
    {
        return InfoCopropriete::all();
    }
}
