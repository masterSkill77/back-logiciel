<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pige_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function pige(): BelongsTo
    {
        return $this->belongsTo(Pige::class);
    }
}
