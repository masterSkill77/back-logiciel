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
            "biens.city"=> 'required|string',
            "biens.name_country"=> 'required|string',
            "biens.zap_country"=> 'required|string',
            "biens.living_area"=> 'required|integer',
            "biens.land_area"=> 'required|integer',
            "biens.number_room"=> 'required|integer',
            "biens.number_bedroom"=> 'required|integer',
            "biens.number_level"=> 'required|integer',
            "biens.garden_exist"=> 'required|integer',
            "biens.garden_exist_area"=> 'required|integer',
            "biens.garden_exist_private"=> 'required|integer',
            "biens.swim"=> 'required|integer',
            "biens.recent_construct"=> 'nullable|array',
            "biens.swim_exist"=> 'required|array',
            "biens.swim_exist_volume"=> 'required|integer',
            "biens.swim_exist_dimensions"=> 'required|string',
            "biens.swim_sxist_treatment"=> 'required|string',
            "biens.number_garage"=> 'required|integer',
            "biens.indoor_parking"=> 'required|string',
            "biens.outdoor_parking"=> 'required|string',
            "biens.status"=> 'required|array',
            "biens.num_folder"=> 'required|integer',
            "biens.date_folder"=> 'required|date',
            "biens.equipment"=> 'required|array',
            "biens.publish_price"=> 'required|integer',
            "biens.selling_price"=> 'required|integer',
            "biens.publish_property"=> 'required|boolean',
            "biens.rent"=> 'required|integer',
            "biens.duration_lease"=> 'required|integer',
            "biens.photos_id_photos"=> 'integer',
            "biens.info_copropriete_id_infocopropriete"=> 'integer',
            "biens.type_offert_id"=> 'integer',
            "biens.type_estate_id"=> 'integer',
            "biens.interior_detail_id"=> 'integer',
            "biens.exterior_detail_id"=> 'integer',
            "biens.classsification_estate_id"=> 'integer',
            "biens.classification_offert_id"=> 'integer',
            "biens.diagnostic_id_diagnostics"=> 'integer',
            "biens.rental_invest_id_rental_invest"=> 'integer',
            "biens.sector_id_sector"=> 'integer',
            "biens.terrain_id"=> 'integer',
            "biens.info_financiere_id"=> 'integer',
            "biens.advertisement_id"=> 'integer',
            "biens.published"=> 'required|string',
            "biens.solds"=> 'nullable|string',
            "biens.user_id"=> 'integer',
            "biens.agency_id"=> 'integer'
        ];
    }
}
