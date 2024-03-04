<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ExteriorDetail extends Model
{

    use HasFactory;

    protected $casts = [
        'basement' => 'json',
    ];
    
    protected $fillable = [
        'semiOwnership', 'basement', 'withbasement', 'cellar', 'trueCellar', 'balcony', 'withBalcony', 'terrace', 'withTerrace', 'varangue',
        'loggia', 'veranda', 'withVeranda', 'singleStorey', 'typeResidence', 'formatResidence', 'barbecue', 'jacuzzi', 'bikes', 'tennis', 'summerKitchen','floor'
    ];
}