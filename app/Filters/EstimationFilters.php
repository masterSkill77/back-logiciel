<?php

namespace App\Filters;


use Illuminate\Http\Request;

class EstimationFilters extends QueryFilters
{
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function type_bien(string $typeBien = '')
    {
        return $typeBien == '' ? $this->builder : $this->builder->where('bien', $typeBien);
    }

    public function cp_bien(string $cpBien = '')
    {
        return $cpBien == '' ? $this->builder : $this->builder->where('cp_bien', $cpBien);
    }

    public function user_id(string $userId = '')
    {
        return $userId == '' ? $this->builder : $this->builder->where('user_id', $userId);
    }


    public function nb_pieces(string $nbPieces = '')
    {
        if ($nbPieces == '') {
            return $this->builder;
        }
        return $this->builder->whereRaw("JSON_EXTRACT(details_bien, '$.nb_pieces') = ?", [$nbPieces]);
    }

    public function nb_chambre(string $nbChambre = '')
    {
        if ($nbChambre == '') {
            return $this->builder;
        }
        return $this->builder->whereRaw("JSON_EXTRACT(details_bien, '$.nb_chambre') = ?", [$nbChambre]);
    }

    public function nb_salle_eau(string $nbSalleEau = '')
    {
        if ($nbSalleEau == '') {
            return $this->builder;
        }
        return $this->builder->whereRaw("JSON_EXTRACT(details_bien, '$.nb_salle_eau') = ?", [$nbSalleEau]);
    }


    public function nb_salle_bain(string $nbSalleBain = '')
    {
        if ($nbSalleBain == '') {
            return $this->builder;
        }
        return $this->builder->whereRaw("JSON_EXTRACT(details_bien, '$.nb_salle_bain') = ?", [$nbSalleBain]);
    }

    public function surface_habitable(string $surfaceHabitable = '')
    {
        if ($surfaceHabitable == '') {
            return $this->builder;
        }
        return $this->builder->whereRaw("JSON_EXTRACT(details_bien, '$.surface_habitable') = ?", [$surfaceHabitable]);
    }
}
