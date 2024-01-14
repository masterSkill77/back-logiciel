<?php

namespace App\Services;

use App\Models\Bien;
use Illuminate\Database\Eloquent\Collection;

class BienService
{
    public function __construct()
    {
        // Constructor of the class
    }

    public function createBien(array $params): Bien
    {
        $Bien = (new Bien($params));
        $Bien->save();
        return $Bien;
    }

    public function updateBien(Bien $bien, array $params): Bien
    {
        $bien->update($params);
        return $bien;
    }

    public function getBien(): Collection
    {
        return Bien::all();
    }

    public function getById(int $bienId): Bien
    {
        return Bien::where('id', $bienId)->first();
    }
}
