<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoFinanciere extends Model
{
    use HasFactory;

    protected $fillable = [
        'info_price',
        'info_rent',
        'info_rent_encadrement',
        'info_rent_default',
        'info_rent_majored',
        'info_rent_complement',
        'info_locative_charge_total',
        'info_locative_charge_format',
        'info_honoraire_charge',
        'info_estimation_value',
        'info_estimation_date',
        'info_honoraire_locataire_part',
        'info_honoraire_proprio_part',
        'info_predicted_work',
        'info_monthly_charge',
        'info_garantied_deposit',
        'info_fonciere_taxe',
        'info_habitation_taxe',
        'info_ordure_menagere_taxe',
    ];
}
