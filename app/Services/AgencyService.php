<?php

namespace App\Services;

use App\Models\Agency;
use Illuminate\Database\Eloquent\Collection;

class AgencyService
{
    public function store($data): Agency
    {
        return Agency::create($data);
    }

    public function getById(int $agencyId): Agency | null
    {
        return  Agency::where('id', $agencyId)->with('configurations', 'users', 'users.configurations', 'users.biens', 'users.contacts')->first();
    }

    public function getAll(): Collection
    {
        return Agency::all();
    }
}
