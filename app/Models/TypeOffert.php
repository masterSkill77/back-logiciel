<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class TypeOffert extends Model
{
    use HasFactory;
    
    protected $table = 'type_offert';
    public $timestamps = false;
    protected $fillable = [
        'designation'
    ];

    public function classificationOfferts(): HasMany
    {
        return $this->hasMany(classificationOfferts::class, 'typeOffert_id');
    }
}
