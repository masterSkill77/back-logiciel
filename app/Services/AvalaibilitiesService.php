<?php

namespace App\Services;

use App\Models\Availabilities;
use Illuminate\Database\Eloquent\Collection;

class AvalaibilitiesService
{

    public function __construct()
    {
        // Constructor of the class
    }

    public function addAvalaibilities(array $params) : int
    {
        if(isset($params['availabilities']) && is_array($params['availabilities'])) {
            $avalaibilities = (new Availabilities($params['availabilities']));
            $avalaibilities->save();
            return $avalaibilities->id_availability;
        }

        return 0;
        
    }
    
    public function getAll() : Collection
    {
        return Advertisement::all();
    }
}
