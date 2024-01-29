<?php

namespace App\Models;

use App\Events\RegisteredAgencyEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Log;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = ['nameAgency', 'nameCompany', 'addressCompany', 'phoneAgency', 'pige_online_key'];

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

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'agency_id');
    }

    /**
     * Get all of the user's configurations.
     */
    public function configurations()
    {
        return $this->morphMany(Configuration::class, 'entity');
    }
}
