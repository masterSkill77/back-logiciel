<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Availabilities extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_available';

    protected $fillable = ['num_folder', 'immediat', 'release_it', 'available_on'];

    public function bien() : BelongsTo
    {
        return $this->belongsTo(Bien::class);
    }
}
