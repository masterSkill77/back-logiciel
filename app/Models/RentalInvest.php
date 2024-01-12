<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalInvest extends Model
{
    use HasFactory;

    protected $primaryKey  = 'id_rental_invest';

    protected $fillable = ['estimated_rent', 'monthly_rent', 'yeld', 'occupancy'];
}
