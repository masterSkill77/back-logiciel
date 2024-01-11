<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class InteriorDetail extends Model
{

    use HasFactory;

    protected $fillable = [
        'semiOwnership', 'basement', 'withbasement', 'cellar', 'trueCellar', 'balcony', 'withBalcony', 'terrace', 'withTerrace', 'varangue',
        'loggia', 'veranda', 'withVeranda', 'singleStorey', 'typeResidence', 'formatResidence'
    ];
}