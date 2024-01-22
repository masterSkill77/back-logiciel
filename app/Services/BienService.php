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
     * @param int $perPage
     * @param string $sortBy
     * @param string $sortOrder
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAll(int $perPage = 10, string $sortBy = 'id', string $sortOrder = 'asc', array $filters = [])
    {
        $query = Bien::with([
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
            'advertisement'
        ])->orderBy($sortBy, $sortOrder);

        foreach ($filters as $filter => $value) {
            switch ($filter) {
                case 'bienActif':
                    $query->when($value !== null, function ($query) use ($value) {
                        $query->where('statusActif', $value);
                    });
                    break;
                case 'bienInactif':
                    $query->when($value !== null, function ($query) use ($value) {
                        $query->where('statusInActif', $value);
                    });
                    break;
                case 'archived':
                    $query->when($value !== null, function ($query) use ($value) {
                        $query->where('archived', $value);
                    });
                    break;
                case 'vendus':
                    $query->when($value !== null, function ($query) use ($value) {
                        $query->where('vendus', $value);
                    });
                    break;
            }
        }

        return $query->paginate($perPage);
    }
}
