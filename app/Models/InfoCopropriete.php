<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoCopropriete extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_infocopropriete';

    protected $fillabale = ['numero_lots', 'nombre_lots', 'quote_part', 'montant_fond', 'mille_copropriete', 'bien_copropriete']; 

    protected $casts = ['bien_copropriete' => 'json'];
}
