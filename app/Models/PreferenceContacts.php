<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreferenceContacts extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_preference';

    protected $fillable = [
        'criteria', 'min_budgets', 'max_budgets', 'min_surface', 'max_surface', 'min_room', 'max_room', 'min_bedroom', 'max_bedroom', 'localities', 'commune', 'zip', 'start_date', 'end_date', 'night_number', 'type_offert_id', 'type_estate_id',
        'number_level', 'number_wc', 'garden_exist', 'garden_exist_area', 'land_area', 'swim', 'swim_exist_area', 'garage_number', 'indoor_parking', 'exhibition', 'view', 'attic', 'cellar', 'furnished', 'carrez_area', 'stay_area', 'common_ownership',
        'basement', 'cave', 'teracce', 'logia', 'ground_floor', 'balcony', 'varangue', 'veranda', 'heating_format', 'heating_type', 'heating_energy', 'elevator', 'air_conditionning',
        'fireplace', 'glazing', 'ground_surface', 'poolable', 'wooded', 'divisible', 'garden_exist_private', 'swim_exist_statut', 'swim_exist_nature', 'basement_amenaged', 'cave_area', 'teracce_area', 'balcony_area', 'veranda_area',
    ];
}
