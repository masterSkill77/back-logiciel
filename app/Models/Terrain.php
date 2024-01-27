<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terrain extends Model
{
    use HasFactory;
    protected $fillable = ['ground', 'ground_print', 'ground_print_residual','shon','ces','codification_plu','right_way',  'cadastral_ref'  ];
    protected $casts = [
        'ground' => 'array'
    ];
}
