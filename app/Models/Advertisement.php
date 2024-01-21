<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

// Annonce 
class Advertisement extends Model
{
    use HasFactory;
    
    protected $table = 'advertissements';
    protected $fillable = [
        'title',
        'description'
    ];
}
