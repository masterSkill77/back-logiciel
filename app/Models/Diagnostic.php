<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostic extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_diagnostics';

    protected $fillable = ['year_construction', 'dpe_date_realization', 'dpe_property','dpe', 'dpe_ges', 'cost_estimate', 'ref_year'
    , 'amiante', 'amiante_yes_date', 'amiante_yes_comments', 'electric_diagnostic', 'electric_yes_date', 'electric_yes_date', 'electric_yes_comments', 'gaz_diagnostic', 'gaz_yes_date', 'gaz_yes_comments'
    , 'plomb', 'plomb_yes_date', 'plomb_yes_comments', 'loi_carrez', 'loi_carrez_yes_date', 'loi_carrez_yes_comments', 'erp', 'erp_yes_date', 'erp_yes_comments'
    , 'state_parasitaire', 'state_parasitaire_yes_date', 'state_parasitaire_yes_comments', 'assainissement', 'assainissement_yes_date', 'assainissement_yes_comments'];
}
