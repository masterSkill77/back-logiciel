<?php

namespace App\Filters;


use Illuminate\Http\Request;
use Carbon\Carbon;

class EstimationFilters extends QueryFilters
{
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }
}
