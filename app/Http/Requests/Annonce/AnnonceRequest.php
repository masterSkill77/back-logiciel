<?php

namespace App\Http\Requests\Annonce;

use Illuminate\Foundation\Http\FormRequest;

class AnnonceRequest extends FormRequest
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
            "type_offert"=> 'string',
            "type_estate"=> 'string',
            "min_budget"=> 'integer',
            "max_budget"=> 'integer',
            "min_living_area"=> 'integer',
            "max_living_area"=> 'integer',
            "min_part_number"=> 'integer',
            "max_part_number"=> 'integer',
            "min_room_number"=> 'integer',
            "max_room_number"=> 'integer',
            "city"=> 'string',
            "zap_country"=> 'string'
        ];
    }
}