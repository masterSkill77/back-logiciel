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
        'agency_id'
    ];

    /**
     * Scope for getting piges for specific agency
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \App\Models\Agency $agency
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAgency(Builder $query, Agency $agency)
    {
        return $query->where('agency_id', $agency->id);
    }
}
