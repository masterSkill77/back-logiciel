<?php

namespace App\Services;

use App\Models\Agency;
use Illuminate\Database\Eloquent\Collection;

class AgencyService
{
    public function store($data) : Agency
    {
        return Agency::create($data);
    }

    public function getById(int $agencyId): Agency
    {
        return  Agency::where('id', $agencyId)->first();
    }
    
    public function getAll() : Collection
    {
        return Agency::all();
    }
}
