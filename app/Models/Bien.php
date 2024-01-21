<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Bien extends Model
{
    use HasFactory;

    protected $table = 'biens';
    protected $fillable = [
        'city', 'country', 'name_country', 'zap_country', 'living_area', 'land_area', 'number_room', 'number_bedroom', 'number_level', 'garden_exist',
        'garden_exist_area', 'garden_exist_private', 'swim', 'swim_exist', 'swim_exist_volume', 'swim_exist_dimensions', 'swim_sxist_treatment',
        'number_garage', 'indoor_parking', 'outdoor_parking', 'status', 'num_folder', 'equipment', 'date_folder', 'publish_price', 'selling_price', 'publish_property',
        'rent', 'duration_lease', 'photos_id_photos', 'info_copropriete_id_infocopropriete', 'type_offert_id', 'type_estate_id', 'interior_detail_id',
        'exterior_detail_id', 'classification_offert_id', 'classsification_estate_id', 'diagnostic_id_diagnostics', 'rental_invest_id_rental_invest', 'sector_id_sector', 'terrain_id', 'info_financiere_id',
        'advertisement_id',
        'agency_id', 'agent_id'
    ];

    protected $casts = [
        'swim_exist' => 'array',
        'status' => 'array',
        'equipment' => 'array'
    ];

    public function photos(): HasOne
    {
        return $this->hasOne(Photos::class, 'id_photos');
    }

    public function infoCopropriete(): HasOne
    {
        return $this->hasOne(InfoCopropriete::class);
    }

    public function typeOffert(): HasOne
    {
        return $this->hasOne(TypeOffert::class);
    }

    public function typeEstate(): HasOne
    {
        return $this->hasOne(TypeEstate::class);
    }

    public function  interiorDetail(): HasOne
    {
        return $this->hasOne(InteriorDetail::class);
    }

    public function exteriorDetail(): HasOne
    {
        return $this->hasOne(ExteriorDetail::class);
    }

    public function classificationOffert(): HasOne
    {
        return $this->hasOne(ClassificationOffert::class);
    }

    public function classificationEstate(): HasOne
    {
        return $this->hasOne(ClasssificationEstate::class);
    }

    public function diagnostic(): HasOne
    {
        return $this->hasOne(Diagnostic::class);
    }

    public function rentalInvest(): HasOne
    {
        return $this->hasOne(RentalInvest::class);
    }

    public function sector(): HasOne
    {
        return $this->hasOne(Sector::class);
    }

    public function terrain(): HasOne
    {
        return $this->hasOne(Terrain::class);
    }

    public function infoFinanciere(): HasOne
    {
        return $this->hasOne(InfoFinanciere::class);
    }

    public function advertisement(): HasOne
    {
        return $this->hasOne(Advertisement::class);
    }

    public function scopeAgency(Builder $query, Agency $agency): Builder
    {
        return $query->where('agency_id', $agency->id);
    }

    public function scopeAgent(Builder $query, int $agentId): Builder
    {
        return $query->where('agent_id', $agentId);
    }
}
