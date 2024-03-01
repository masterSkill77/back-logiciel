<?php

namespace App\Filters;


use Illuminate\Http\Request;
use Carbon\Carbon;

class PigeFilters extends QueryFilters
{
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    /**
     * Filter from type of estate
     */
    public function type(string $type = '')
    {
        if ($type == '')
            return $this->builder;
        return $this->builder->where('type', $type);
    }

    /**
     * Filter from the estate form
     */
    public function bien(string $bien = '')
    {
        if ($bien == '')
            return $this->builder;
        return $this->builder->where('bien', $bien);
    }

    /**
     * Filter from the estate postal code
     */
    public function cp(string $cp = '')
    {
        if ($cp == '')
            return $this->builder;
        $cp = explode(',', $cp);
        return $this->builder->whereIn('cp', $cp);
    }


    /**
     * Filter from the estate keyword
     */
    public function keyword(string $keyword = '')
    {
        if ($keyword == '')
            return $this->builder;
        return $this->builder->where(function ($query) use ($keyword) {
            $query->where('titre', 'like', "%$keyword%")
                ->orWhere('texte', 'like', "%$keyword%");
        });;
    }

    public function budget_max(int | string $budgetMax = '')
    {
        if ($budgetMax == '')
            return $this->builder;
        return $this->builder->where('prix', '<=', (int) $budgetMax);
    }
    public function budget_min(int | string $budgetMin = '')
    {
        if ($budgetMin == '')
            return $this->builder;
        return $this->builder->where('prix', '>=', (int) $budgetMin);
    }


    public function piece_max(int | string $pieces = '')
    {
        if ($pieces == '')
            return $this->builder;
        return $this->builder->where('pieces', '<=', (int) $pieces);
    }
    public function piece_min(int | string $pieces = '')
    {
        if ($pieces == '')
            return $this->builder;
        return $this->builder->where('pieces', '>=', (int) $pieces);
    }


    public function surface_max(int | string $surface = '')
    {
        if ($surface == '')
            return $this->builder;
        return $this->builder->where('surface', '<=', (int) $surface);
    }
    public function surface_min(int | string $surface = '')
    {
        if ($surface == '')
            return $this->builder;
        return $this->builder->where('surface', '>=', (int) $surface);
    }

    public function values(string $values = '')
    {
        if ($values == '') return $this->builder;
        foreach (explode(',', $values) as $filter) {
            $this->builder = $this->builder->where($filter, '>', 0);
        }
        return $this->builder;
    }
}
