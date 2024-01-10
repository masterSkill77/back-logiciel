<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ClasssificationEstate extends Model
{
    use HasFactory;
    
    protected $table = 'classsification_estate';
    protected $fillable = [
        'designation'
    ];
}
