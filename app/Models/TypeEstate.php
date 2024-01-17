<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

// type de bien 
class TypeEstate extends Model
{
    use HasFactory;
    
    protected $table = 'type_estate';
    protected $fillable = [
        'designation'
    ];

    public function classificationEstate(): HasMany
    {
        return $this->hasMany(ClasssificationEstate::class, 'type_estate_id');
    }
}
