<?php

namespace App\Http\Requests\PreferencyContact;

use App\Http\Requests\ValidationErrors;
use Illuminate\Foundation\Http\FormRequest;

class PreferencyContactRequest extends FormRequest
{
    use ValidationErrors;

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
            "preferencyContact.criteria" => 'required|string',
            "preferencyContact.min_budgets" => 'nullable',
            "preferencyContact.max_budgets" => 'nullable',
            "preferencyContact.min_surface" => 'nullable',
            "preferencyContact.max_surface" => 'nullable',
            "preferencyContact.min_room" => 'nullable|integer',
            "preferencyContact.max_room" => 'nullable|integer',
            "preferencyContact.min_bedroom" => 'nullable|integer',
            "preferencyContact.max_bedroom" => 'nullable|integer',
            "preferencyContact.localities" => 'nullable|string',
            "preferencyContact.commune" => 'nullable|string',
            "preferencyContact.zip" => 'nullable|string',
            "preferencyContact.start_date" => 'nullable|date',
            "preferencyContact.end_date" => 'nullable|date',
            "preferencyContact.night_number" => 'nullable|integer',
            "preferencyContact.type_offert_id" => 'nullable|integer',
            "preferencyContact.type_estate_id" => 'nullable|integer',
            "preferencyContact.number_level"=> 'nullable|integer',
            "preferencyContact.number_wc"=> 'nullable|integer',
            "preferencyContact.garden_exist"=> 'nullable|integer',
            "preferencyContact.garden_exist_area"=> 'nullable|numeric',
            "preferencyContact.land_area"=> 'nullable|numeric',
            "preferencyContact.swim"=> 'nullable|integer',
            "preferencyContact.swim_exist_area"=> 'nullable|numeric',
            "preferencyContact.garage_number"=> 'nullable|integer',
            "preferencyContact.indoor_parking"=> 'nullable|integer',
            "preferencyContact.outdoor_parking"=> 'nullable|integer',
            "preferencyContact.exhibition"=> 'nullable|string',
            "preferencyContact.view"=> 'nullable|string',
            "preferencyContact.attic"=> 'nullable|integer',
            "preferencyContact.cellar"=> 'nullable|integer',
            "preferencyContact.furnished"=> 'nullable|integer',
            "preferencyContact.carrez_area"=> 'nullable|numeric',
            "preferencyContact.stay_area"=> 'nullable|numeric',
            "preferencyContact.common_ownership"=> 'nullable|string',
            "preferencyContact.basement"=> 'nullable|string',
            "preferencyContact.cave"=> 'nullable|integer',
            "preferencyContact.teracce"=> 'nullable|integer',
            "preferencyContact.logia"=> 'nullable|integer',
            "preferencyContact.ground_floor"=> 'nullable|integer',
            "preferencyContact.balcony"=> 'nullable|integer',
            "preferencyContact.varangue"=> 'nullable|integer',
            "preferencyContact.veranda"=> 'nullable|integer',
            "preferencyContact.heating_format"=> 'nullable|string',
            "preferencyContact.heating_type"=> 'nullable|string',
            "preferencyContact.heating_energy"=> 'nullable|string',
            "preferencyContact.elevator"=> 'nullable|integer',
            "preferencyContact.air_conditionning"=> 'nullable|integer',
            "preferencyContact.fireplace"=> 'nullable|integer',
            "preferencyContact.glazing"=> 'nullable|string',
            "preferencyContact.ground_surface"=> 'nullable|string',
            "preferencyContact.poolable"=> 'nullable|integer',
            "preferencyContact.wooded"=> 'nullable|integer',
            "preferencyContact.divisible"=> 'nullable|integer',
            "preferencyContact.garden_exist_private"=> 'nullable|integer',
            "preferencyContact.swim_exist_statut"=> 'nullable|integer',
            "preferencyContact.swim_exist_nature"=> 'nullable|integer',
            "preferencyContact.basement_amenaged"=> 'nullable|string',
            "preferencyContact.cave_area"=> 'nullable|numeric',
            "preferencyContact.teracce_area"=> 'nullable|numeric',
            "preferencyContact.balcony_area"=> 'nullable|numeric',
            "preferencyContact.veranda_area"=> 'nullable|numeric',
        ];
    }
}