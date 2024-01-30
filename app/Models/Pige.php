<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pige extends Model
{
    use HasFactory;

    public $fillable = [
        'id',
        'bien',
        'type',
        'ville',
        'cp',
        'titre',
        'texte',
        'date',
        'prix',
        'prix_evolution',
        'loyer_cc',
        'meuble',
        'pieces',
        'chambres',
        'surface',
        'sources',
        'img',
        'tel_1',
        'tel_2',
        'stop',
        "stop_date",
        'email',
        'annonceur',
        'latitude',
        'longitude',
        'adresse',
        'maj',
        'bloctel',
    ];

    public function scopeAgency(Builder $query, Agency $agency)
    {
        $postalCodes = $agency->configurations()->pluck('code_postal');
        return $query->whereIn('cp', $postalCodes);
    }
}
