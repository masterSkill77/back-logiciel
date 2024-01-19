<?php

namespace App\Services;

use App\Models\ClasssificationEstate;
use Illuminate\Database\Eloquent\Collection;

class ClassificationEstateService
{

    public function __construct()
    {
        // Constructor of the class
    }

    public function findAll() :Collection
    {
        return ClasssificationEstate::all();
    }

    public function getById(int $classificationEstate):ClasssificationEstate
    {
        return ClasssificationEstate::where('id', $classificationEstate)->first();
    }
}