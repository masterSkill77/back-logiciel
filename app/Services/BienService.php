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

    public function createBien(array $params): int
    {
        if(isset($params['biens']) && is_array($params['biens'])) {
            $Bien = (new Bien($params['biens']));
            $Bien->save();
            return $Bien->id;
        }

        return 0;
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
        return Bien::with([
            'photos',
            'infoCopropriete',
            'typeOffert',
            'typeEstate',
            'interiorDetail',
            'exteriorDetail',
            'classificationOffert',
            'classificationEstate',
            'diagnostic',
            'rentalInvest',
            'sector',
            'terrain',
            'infoFinanciere',
            'advertisement',
        ])->find($bienId);
    }

    public function findAll() :Collection
    {
        
        return Bien::with('photos')->get();

    }
}
