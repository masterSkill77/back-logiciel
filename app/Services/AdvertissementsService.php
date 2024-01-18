<?php

namespace App\Services;

use App\Models\Advertisement;
use Illuminate\Database\Eloquent\Collection;

class AdvertissementsService
{
    public function store(array $params) : int
    {
        if(isset($params['advertissement']) && is_array($params['advertissement'])) {
            $advertissement = (new Advertisement($params['advertissement']));
            $advertissement->save();
            return $advertissement->id;
        }

        return 0;
        
    }

    public function getById(int $advertissementId): Advertisement
    {
        return  Advertisement::where('id', $advertissementId)->first();
    }
    
    public function getAll() : Collection
    {
        return Advertisement::all();
    }
}
