<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TypeEstate extends Model
{
    use HasFactory;
    
    protected $table = 'type_estate';
    protected $fillable = [
        'designation'
    ];
}
