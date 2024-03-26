<?php

namespace App\Http\Requests\Bien;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\ValidationErrors;

class BienRequest extends FormRequest
{
    use ValidationErrors;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "biens.city" => '',
            "biens.name_country" => '',
            "biens.zap_country" => '',
            "biens.living_area" => '',
            "biens.land_area" => '',
            "biens.number_room" => '',
            "biens.number_bedroom" => '',
            "biens.number_level" => '',
            "biens.garden_exist" => '',
            "biens.garden_exist_area" => '',
            "biens.garden_exist_private" => '',
            "biens.swim" => '',
            "biens.recent_construct" => 'nullable|array',
            "biens.swim_exist" => '',
            "biens.swim_exist.*.volume" => '',
            "biens.swim_exist.*.dimensions" => '',
            "biens.swim_exist.*.treatment" => 'string',
            "biens.number_garage" => '',
            "biens.indoor_parking" => '',
            "biens.outdoor_parking" => '',
            "biens.status" => 'array',
            "biens.num_folder" => '',
            "biens.date_folder" => 'nullable',
            "biens.equipment" => 'array',
            "biens.publish_price" => '',
            "biens.selling_price" => '',
            "biens.publish_property" => '',
            "biens.rent" => '',
            "biens.duration_lease" => '',
            "biens.photos_id_photos" => '',
            "biens.info_copropriete_id_infocopropriete" => '',
            "biens.type_offert_id" => '',
            "biens.type_estate_id" => '',
            "biens.interior_detail_id" => '',
            "biens.exterior_detail_id" => '',
            "biens.classsification_estate_id" => '',
            "biens.classification_offert_id" => '',
            "biens.diagnostic_id_diagnostics" => '',
            "biens.rental_invest_id_rental_invest" => '',
            "biens.sector_id_sector" => '',
            "biens.terrain_id" => '',
            "biens.info_financiere_id" => '',
            "biens.advertisement_id" => '',
            "biens.published" => 'string',
            "biens.solds" => 'nullable|string',
            "biens.user_id" => '',
            "biens.agency_id" => ''
        ];
    }
}
