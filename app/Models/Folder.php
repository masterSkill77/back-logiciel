<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Folder extends Model
{
    use HasFactory;

    protected $fillable = [
        'folder_type',
        'bien_id',
        'agency_id',
        'num_mandat',
        'date_signature',
        'debut_bail',
        'fin_bail',
    ];

    public function steps(): HasMany
    {
        return $this->hasMany(Step::class, 'folder_id');
    }
}
