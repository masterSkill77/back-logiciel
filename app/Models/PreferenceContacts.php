<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreferenceContacts extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_preference';

    protected $fillable = ['criteria', 'min_budgets', 'max_budgets', 'min_surface','max_surface', 'min_room', 'max_room', 'min_bedroom'
    ,'max_bedroom', 'localities', 'commune', 'zip', 'start_date', 'end_date', 'night_number', 'type_offert_id', 'type_estate_id'];


}

