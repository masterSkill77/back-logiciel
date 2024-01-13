<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

// Annonce 
class Announcement extends Model
{
    use HasFactory;
    
    protected $table = 'announcement';
    protected $fillable = [
        'titleAnnounce',
        'description'
    ];
}
