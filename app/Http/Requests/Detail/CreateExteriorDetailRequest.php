<?php

namespace App\Http\Requests\Detail;

use Illuminate\Foundation\Http\FormRequest;

class CreateExteriorDetailRequest extends FormRequest
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
            "semiOwnership"=> 'required|json',
            "basement"=> 'required|json',
            "withbasement"=> 'required|float',
            "cellar"=> 'required|integer',
            "trueCellar"=> 'required|float',
            "balcony"=> 'required|integer',
            "withBalcony"=> 'required|float',
            "terrace"=> 'required|integer',
            "withTerrace"=> 'required|float',
            "varangue"=> 'required|integer',
            "loggia"=> 'required|integer',
            "veranda"=> 'required|integer',
            "withVeranda"=> 'required|float',
            "singleStorey"=> 'required|integer',
            "typeResidence"=> 'required|string',
            "formatResidence"=> 'required|string'
        ];
    }
}