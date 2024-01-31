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
}
