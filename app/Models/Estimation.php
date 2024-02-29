<?php

namespace App\Models;

use App\Filters\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Estimation extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = [
        'bien',
        'demandeur_firstname',
        'demandeur_lastname',
        'demandeur_email',
        'details_bien',
        'user_id',
        'agency_id',
        'address_bien',
        'cp_bien',
        'ville_bien',
    ];

    public function scopeAgency(Builder $builder, Agency $agency): Builder
    {
        return $builder->where('agency_id', $agency->id);
    }

    public function agency(): BelongsTo
    {
        return $this->belongsTo(Agency::class, 'agency_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
