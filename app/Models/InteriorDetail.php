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
    ];
    protected $fillable = [
        'category', 'nbOfSleeping', 'nbOfBathroom', 'nbOfRoomWater', 'nbOfWc', 'caracteristique', 'surfaceSquare', 'surfaceStay',
        'TypeOfKitchen', 'StateOfKitchen', 'surfaceBoutin', 'nbOfLots', 'hotplate', 'oven', 'microwave', 'freezer', 'fridge',
        'dishwasher', 'coffeeMaker', 'toaster', 'tv', 'internet', 'hifi', 'washingMachine', 'dryer', 'iron', 'babyEquipment',
        'nbOfBathtubs', 'nbOfShowers'
    ];
}
