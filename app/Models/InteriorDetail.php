<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class InteriorDetail extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'category', 'nbOfSleeping', 'nbOfBathroom', 'nbOfRoomWater', 'nbOfWc', 'caracteristique', 'surfaceSquare', 'surfaceStay',
        'TypeOfKitchen', 'StateOfKitchen'
    ];
}