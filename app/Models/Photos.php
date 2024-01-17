<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_photos';


    protected $fillable = ['photos_original', 'photos_slide'];

    protected $casts = [
        'photos_slide' => 'array'
    ];
}
