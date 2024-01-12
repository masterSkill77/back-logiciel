<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Bien extends Model
{
    use HasFactory;
    
    protected $table = 'bien';
    protected $fillable = [
        'city','country','name_country','zap_country','living_area', 'land_area','number_room','number_bedroom','number_level','garden_exist',
        'garden_exist_area','garden_exist_private','swim','swim_exist','swim_exist_volume', 'swim_exist_dimensions', 'swim_sxist_treatment',
        'number_garage','indoor_parking','outdoor_parking', 'status', 'num_folder', 'date_folder', 'publish_price', 'selling_price', 'publish_property',
        'rent', 'duration_lease','photos_id_photos', 'info_copropriete_id_infocopropriete', 'type_offert_id', 'type_estate_id', 'interior_detail_id',
        'exterior_detail_id','classification_estate_id', 'diagnostic_id', 'rental_invest_id_rental_invest', 'sector_id_sector'
    ];

     public function photos():HasOne
     {
        return $this->hasOne(Photos::class);
     }

     public function infococpropriete():HasOne
     {
        return $this->hasOne(InfoCopropriete::class);
     }

     public function typeoffert():HasOne
     {
        return $this->hasOne(TypeOffert::class);
     }

     public function typeestate() :HasOne 
     {
        return $this->hasOne(TypeEstate::class);
     }

     public function  interiordetail() :HasOne
     {
        return $this->hasOne(InteriorDetail::class);
     }

     public function exteriordetail() :HasOne
     {
        return $this->hasOne(ExteriorDetail::class);
     }

     public function classificationoffert() :HasOne
     {
        return $this->hasOne(ClassificationOffert::class);
     }

     public function classificationestate() :HasOne
     {
        return $this->hasOne(ClasssificationEstate::class);
     }

     public function diagnostic() :HasOne 
     {
        return $this->hasOne(Diagnostic::class);
     }

     public function rentalInvest() :HasOne
     {
        return $this->hasOne(RentalInvest::class);
     }

     public function sector() :HasOne
     {
        return $this->hasOne(Sector::class);
     }
}
