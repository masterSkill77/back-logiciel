<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoFinanciere extends Model
{
    use HasFactory;

    protected $casts = [
        'info_honoraire_proprio_part' => 'array',
        'info_rent_encadrement' => 'array',
        'info_tenant_chare' => 'array'
    ];

    protected $fillable = [
        'info_price',
        'info_honoraire_charge',
        'info_honoraire_locataire_part',
        'info_rent',
        'info_tenant_chare',
        'info_owner_share',
        'info_locative_charge_total',
        'info_locative_charge_format',
        'info_locative_charge_information',
        'info_estimation_value',
        'info_estimation_date',
        'info_predicted_work',
        'info_monthly_charge',
        'info_garantied_deposit',
        'info_fonciere_taxe',
        'info_habitation_taxe',
        'info_ordure_menagere_taxe',
        'info_honoraire_proprio_part',
        'info_rent_encadrement',

        
    ];
}
