<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ClassificationOffert extends Model
{
    use HasFactory;
    protected $table = 'classification_offert';
    
    protected $fillable = [
        'designation',
        'typeOffert_id'
    ];

    public function typeOffert(): BelongsTo
    {
        return $this->belongsTo(typeOffert::class, 'typeOffert_id');
    }
}
