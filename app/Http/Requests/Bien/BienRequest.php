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
            "city"=> 'required|string',
            "name_country"=> 'required|string',
            "zap_country"=> 'required|string',
            "living_area"=> 'required|integer',
            "land_area"=> 'required|integer',
            "number_room"=> 'required|integer',
            "number_bedroom"=> 'required|integer',
            "number_level"=> 'required|integer',
            "garden_exist"=> 'required|integer',
            "garden_exist_area"=> 'required|integer',
            "garden_exist_private"=> 'required|integer',
            "swim"=> 'required|integer',
            "swim_exist"=> 'required|array',
            "swim_exist_volume"=> 'required|integer',
            "swim_exist_dimensions"=> 'required|string',
            "swim_sxist_treatment"=> 'required|string',
            "number_garage"=> 'required|integer',
            "indoor_parking"=> 'required|string',
            "outdoor_parking"=> 'required|string',
            "status"=> 'required|array',
            "num_folder"=> 'required|integer',
            "date_folder"=> 'required|date',
            "equipment"=> 'required|array',
            "publish_price"=> 'required|integer',
            "selling_price"=> 'required|integer',
            "publish_property"=> 'required|boolean',
            "rent"=> 'required|integer',
            "duration_lease"=> 'required|integer'
        ];
    }
}
