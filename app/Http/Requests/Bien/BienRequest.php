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

            "biens.publish_price"=> 'nullable|integer',
            "biens.selling_price"=> 'nullable|integer',
            "biens.rent"=> 'nullable|integer',
            "biens.duration_lease"=> 'nullable|nullable|integer',
            "biens.living_area"=> 'nullable|integer',
            "biens.number_room"=> 'nullable|integer',
            "biens.number_bedroom"=> 'nullable|integer',
            "biens.number_level"=> 'nullable|integer',
            "biens.garden"=> 'nullable|integer',
            "biens.garden_exist"=> 'nullable|integer',
            "biens.land_area"=> 'nullable|integer',
            "biens.swim"=> 'nullable|integer',
            "biens.swim_exist"=> 'array',
            "biens.number_garage"=> 'nullable|integer',
            "biens.indoor_parking"=> 'nullable|string',
            "biens.outdoor_parking"=> 'nullable|string',
            "biens.status"=> 'array',
            "biens.city"=> 'nullable|string',
            "biens.name_country"=> 'nullable|string',
            "biens.zap_country"=> 'nullable|string',
            "biens.num_folder"=> 'nullable|integer',
            "biens.date_folder"=> 'nullable|date',
            "biens.equipment"=> 'nullable|array',
            "biens.publish_property"=> 'nullable|boolean',
            "biens.publish"=> 'nullable|boolean',
            "biens.sold"=> 'nullable|boolean',
            "biens.recent_construct"=> 'nullable|array',

            "biens.photos_id_photos"=> 'nullable|integer',
            "biens.info_copropriete_id_infocopropriete"=> 'nullable|integer',
            "biens.type_offert_id"=> 'nullable|integer',
            "biens.type_estate_id"=> 'nullable|integer',
            "biens.interior_detail_id"=> 'nullable|integer',
            "biens.exterior_detail_id"=> 'nullable|integer',
            "biens.classsification_estate_id"=> 'nullable|integer',
            "biens.classification_offert_id"=> 'nullable|integer',
            "biens.diagnostic_id_diagnostics"=> 'nullable|integer',
            "biens.rental_invest_id_rental_invest"=> 'nullable|integer',
            "biens.sector_id_sector"=> 'nullable|integer',
            "biens.terrain_id"=> 'nullable|integer',
            "biens.info_financiere_id"=> 'nullable|integer',
            "biens.advertisement_id"=> 'nullable|integer',
            "biens.user_id"=> 'nullable|integer',
            "biens.agency_id"=> 'nullable|integer'
        ];
    }
}
