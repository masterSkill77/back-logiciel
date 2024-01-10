<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoCopropriete extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_infocopropriete';

    protected $fillabale = ['total_unit', 'lot_number', 'annual_charges', 'amount_fund', 'thousands_copropriete', 'property_copropriete']; 

    protected $casts = ['property_copropriete' => 'json'];
}
