<?php

namespace App\Services;

use App\Models\Bien;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class BienService
{
    public function __construct()
    {
        // Constructor of the class
    }

    public function createBien(array $params): int
    {
        if (isset($params['biens']) && is_array($params['biens'])) {
            $Bien = (new Bien($params['biens']));
            $Bien->save();
            return $Bien->id_bien;
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
                'folder',
                'folder.steps',
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
    public function findAll(int $perPage = 10, ?string $sortBy = 'id_bien', ?string $sortOrder = 'asc', ?array $filters = [], ?string $search)
    {
        $user = Auth::user();
        $query = Bien::with([
            'photos',
            'agent',
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
        $query->where('agency_id', $user->agency_id);
        $query = $this->applyFilters($query, $filters);
        $query = $this->searchByKeyword($query, $search);


        return $query->paginate($perPage);
    }

    /**
     * Appliquer les filtres.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function applyFilters($query, array $filters)
    {
        if (isset($filters['filter'])) {
            $filterValue = $filters['filter'];

            switch ($filterValue) {
                case 'actif':
                    $query->where('publish', true);
                    break;
                case 'inactif':
                    $query->where('publish', false);
                    break;
                case 'archivés':
                    $query->where('sold', true);
                    break;
                case 'vendus':
                    $query->where('sold', false);
                    break;
            }
        }

        return $query;
    }


    /**
     * Recherche des biens par mot-clé.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string|null $keyword
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function searchByKeyword($query, ?string $keyword)
    {
        if (!is_null($keyword)) {
            $query->where(function ($query) use ($keyword) {
                $query->where('city', 'like', '%' . $keyword . '%')
                    ->orWhere('zap_country', 'like', '%' . $keyword . '%')
                    ->orWhereHas('diagnostic', function ($query) use ($keyword) {
                        $query->where('dpe_consommation', 'like', '%' . $keyword . '%');
                    });
            });
        }

        return $query;
    }

    /**
     * Get the estate based on its mandat num
     * @param int $numFolder
     * @return \App\Models\Bien | null
     */
    public function getByMandat(int $numFolder): Bien | null
    {
        return Bien::where('num_folder', $numFolder)->with([
            'folder.steps',
            'folder',
            'photos',
            'agent',
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
        ])->first();
    }

    public function updateStatusById(int $BienId, $status) : Bien
    {
      
        $bien = Bien::where('id_bien', $BienId)->first();
        if($bien != null ){
            if(isset($status['publish'])){
                $bien->update(['publish'=> $status['publish']]);
            }
            if(isset($status['sold'])){
                $bien->update(['sold'=> $status['sold']]);
            }
        }
        return $bien;
    } 
}
