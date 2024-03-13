<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;
    protected $primaryKey ='id_sector';
    protected $fillable = ['advertised_country','public_zap', 'public_country', 'private_zap',  'private_country', 'property_address',  'address_completed'
    ,'building','prox_service', 'environment' ];
}
