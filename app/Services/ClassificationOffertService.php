<?php

namespace App\Services;

use App\Models\ClassificationOffert;
use Illuminate\Database\Eloquent\Collection;

class ClassificationOffertService
{
    public function __construct()
    {
        // Constructor of the class
    }

    public function findAll() :Collection
    {
        return ClassificationOffert::all();
    }

    public function getById(int $classificationOffert): ClassificationOffert
    {
        return ClassificationOffert::where('id', $classificationOffert)->first();
    }
}