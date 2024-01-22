<?php

namespace App\Services;

use App\Models\Bien;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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

    // find identification de la bien avec leur relation 
    public function getById(int $bienId): ?Bien
    {
        try {
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
                'advertisement'
            ])->find($bienId);
        } catch (ModelNotFoundException $e) {
            return null;
        }
    }

    /**
     * return list bien avec leur relation
     */
    public function findAll() :Collection
    {
        
        return Bien::with([
            'photos', 
            'infoCopropriete', 
            'typeOffert',
            'typeEstate',
            'interiorDetail',
            'rentalInvest',
            'exteriorDetail',
            'classificationOffert',
            'classificationEstate',
            'diagnostic', 
            'sector',
            'terrain',
            'infoFinanciere',
            'advertisement'])->get();

    }
}
