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


    // public function nb_pieces(string $nbPieces = '')
    // {
    //     return $nbPieces == '' ? $this->builder : $this->builder->where('bien', $typeBien);
    // }
}
