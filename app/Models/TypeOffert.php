<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        return $this->hasMany(ClassificationOffert::class, 'type_offert_id');
    }
    public function bien(): BelongsTo
    {
        return $this->belongsTo(Bien::class);
    }
}
