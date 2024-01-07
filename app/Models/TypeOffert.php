<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TypeOffert extends Model
{
    use HasFactory;
    
    protected $timestamps = false;
    protected $fillable = [
        'designation'
    ];
}
