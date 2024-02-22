<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimation extends Model
{
    use HasFactory;

    protected $fillable = [
        'bien',
        'demandeur_firstname',
        'demandeur_lastname',
        'demandeur_email',
        'details_bien',
        'agency_id'
    ];
}
