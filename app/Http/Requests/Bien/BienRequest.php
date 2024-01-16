<?php

namespace App\Http\Requests\Bien;

use Illuminate\Foundation\Http\FormRequest;

class BienRequest extends FormRequest
{
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
            "city"=> 'required|string',
            "name_country"=> 'required|string',
            "zap_country"=> 'required|string',
            "living_area"=> 'required|float',
            "land_area"=> 'required|float',
            "number_room"=> 'required|integer',
            "number_bedroom"=> 'required|integer',
            "number_level"=> 'required|integer',
            "garden_exist"=> 'required|integer',
            "garden_exist_area"=> 'required|float',
            "garden_exist_private"=> 'required|integer',
            "swim"=> 'required|integer',
            "swim_exist"=> 'required|json',
            "swim_exist_volume"=> 'required|float',
            "swim_exist_dimensions"=> 'required|string',
            "swim_sxist_treatment"=> 'required|string',
            "number_garage"=> 'required|integer',
            "indoor_parking"=> 'required|string',
            "outdoor_parking"=> 'required|string',
            "status"=> 'required|json',
            "num_folder"=> 'required|integer',
            "date_folder"=> 'required|date',
            "equipment"=> 'required|json',
            "publish_price"=> 'required|float',
            "selling_price"=> 'required|float',
            "publish_property"=> 'required|boolean',
            "rent"=> 'required|float',
            "duration_lease"=> 'required|integer',
            "equipment"=> 'required|json'
        ];
    }
}
