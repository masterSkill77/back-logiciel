<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Bien extends Model
{
    use HasFactory;

    protected $table = 'biens';
    protected $primaryKey = 'id_bien';

    protected $fillable = [
        'city', 'country', 'name_country', 'zap_country', 'living_area', 'land_area', 'number_room', 'number_bedroom', 'number_level', 'garden_exist',
        'garden_exist_area', 'garden_exist_private', 'swim', 'swim_exist', 'swim_exist_volume', 'swim_exist_dimensions', 'swim_sxist_treatment',
        'number_garage', 'indoor_parking', 'outdoor_parking', 'status', 'num_folder', 'equipment', 'date_folder', 'publish_price', 'selling_price', 'publish_property',
        'rent', 'duration_lease', 'photos_id_photos', 'recent_construct', 'info_copropriete_id_infocopropriete', 'type_offert_id', 'type_estate_id', 'interior_detail_id',
        'exterior_detail_id', 'classification_offert_id', 'classsification_estate_id', 'diagnostic_id_diagnostics', 'rental_invest_id_rental_invest', 'sector_id_sector', 'terrain_id', 'info_financiere_id',
        'advertisement_id', 'publish', 'sold', 'availabilities_id_availability',
        'agency_id', 'agent_id'
    ];

    protected $casts = [
        'swim_exist' => 'array',
        'status' => 'array',
        'equipment' => 'array',
        'recent_construct' => 'array'
    ];

    public function photos(): HasOne
    {
        return $this->hasOne(Photos::class, 'id_photos', 'photos_id_photos');
    }

    public function infoCopropriete(): HasOne
    {
        return $this->hasone(InfoCopropriete::class, 'id_infocopropriete', 'info_copropriete_id_infocopropriete');
    }

    public function typeOffert(): HasOne
    {
        return $this->hasOne(TypeOffert::class, 'id', 'type_offert_id');
    }

    public function typeEstate(): HasOne
    {
        return $this->hasOne(TypeEstate::class, 'id', 'type_estate_id');
    }

    public function  interiorDetail(): HasOne
    {
        return $this->hasOne(InteriorDetail::class, 'id', 'interior_detail_id');
    }

    public function exteriorDetail(): HasOne
    {
        return $this->hasOne(ExteriorDetail::class, 'id', 'exterior_detail_id');
    }

    public function classificationOffert(): HasOne
    {
        return $this->hasOne(ClassificationOffert::class, 'id', 'classification_offert_id');
    }

    public function classificationEstate(): HasOne
    {
        return $this->hasOne(ClasssificationEstate::class, 'id', 'classsification_estate_id');
    }

    public function diagnostic(): HasOne
    {
        return $this->hasOne(Diagnostic::class, 'id_diagnostics', 'diagnostic_id_diagnostics');
    }

    public function rentalInvest(): HasOne
    {
        return $this->hasOne(RentalInvest::class, 'id_rental_invest', 'rental_invest_id_rental_invest');
    }

    public function sector(): HasOne
    {
        return $this->hasOne(Sector::class, 'id_sector', 'sector_id_sector');
    }

    public function terrain(): HasOne
    {
        return $this->hasOne(Terrain::class, 'id', 'terrain_id');
    }

    public function infoFinanciere(): HasOne
    {
        return $this->hasOne(InfoFinanciere::class, 'id', 'info_financiere_id');
    }

    public function advertisement(): HasOne
    {
        return $this->hasOne(Advertisement::class, 'id', 'advertisement_id');
    }

    public function agent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'agent_id');
    }
    public function availabilities(): HasOne
    {
        return  $this->hasOne(Availabilities::class, 'id_availability', 'availabilities_id_availability');
    }

    public function scopeAgency(Builder $query, Agency $agency): Builder
    {
        return $query->where('agency_id', $agency->id);
    }

    public function scopeAgent(Builder $query, int $agentId): Builder
    {
        return $query->where('agent_id', $agentId);
    }

    public function folder(): HasOne
    {
        return $this->hasOne(Folder::class, 'bien_id');
    }

    public function mandate(): BelongsTo
    {
        return $this->belongsTo(Mandate::class);
    }
    
}
