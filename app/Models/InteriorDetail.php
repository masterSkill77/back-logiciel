<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class InteriorDetail extends Model
{
    use HasFactory;
    
    protected $casts = [
        'caracteristique' => 'array',
        'category' => 'array',
        'kitchenEquipment' => 'array',
        'multimedia' => 'array',
        'othersEquipment' => 'array',
    ];
    protected $fillable = [
        'category', 'nbOfSleeping', 'nbOfBathroom', 'nbOfRoomWater', 'nbOfWc', 'caracteristique', 'surfaceSquare', 'surfaceStay',
        'TypeOfKitchen', 'StateOfKitchen', 'surfaceBoutin', 'nbOfLots','kitchenEquipment', 'multimedia', 'othersEquipment',
        'nbOfBathtubs', 'nbOfShowers'
    ];
}
