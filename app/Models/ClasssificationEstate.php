<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ClasssificationEstate extends Model
{
    use HasFactory;
    
    protected $table = 'classification_estate';
    protected $fillable = [
        'designation',
        'typeEstate_id'
    ];

    public function typeState(): BelongsTo
    {
        return $this->belongsTo(typeEstate::class, 'type_estate_id');
    }
}
