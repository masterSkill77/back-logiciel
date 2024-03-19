<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;

    /**
     * Get all of the owning configurable models.
     */
    public function configurable()
    {
        return $this->morphTo();
    }
}
