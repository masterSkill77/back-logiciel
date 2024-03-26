<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photos extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_photos';


    protected $fillable = ['photos_couvert', 'photos_slide'];

    protected $casts = [
        'photos_couvert' => 'array',
        'photos_slide' => 'array',
    ];

    public function bien(): BelongsTo
    {
        return $this->belongsTo(Bien::class);
    }
}
