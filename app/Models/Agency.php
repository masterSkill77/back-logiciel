<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = ['nameAgency', 'nameCompany', 'addressCompany', 'phoneAgency'];

    /**
     * Scope for specifing directly the agenceId without making the condition `where('id', agenceId)`
     * @param Illuminate\Database\Eloquent\Builder $builder
     * @param int $agenceId
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeAgency(Builder $builder, int $agenceId): Builder
    {
        return $builder->where('id', $agenceId);
    }
}
