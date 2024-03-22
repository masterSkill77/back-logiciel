<?php

namespace App\Http\Requests\Detail;

use App\Http\Requests\ValidationErrors;
use Illuminate\Foundation\Http\FormRequest;

class CreateExternDetailRequest extends FormRequest
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
            "exteriorDetail" => "required",
            "exteriorDetail.semiOwnership" => 'required|string',
            "exteriorDetail.basement" => 'nullable|string',
            "exteriorDetail.withbasement" => 'nullable|float',
            "exteriorDetail.cellar" => 'nullable',
            "exteriorDetail.trueCellar" => 'nullable',
            "exteriorDetail.balcony" => 'required|integer',
            "exteriorDetail.withBalcony" => 'nullable',
            "exteriorDetail.terrace" => 'required|integer',
            "exteriorDetail.withTerrace" => 'nullable',
            "exteriorDetail.varangue" => 'required|integer',
            "exteriorDetail.loggia" => 'required|integer',
            "exteriorDetail.veranda" => 'required|integer',
            "exteriorDetail.withVeranda" => 'nullable',
            "exteriorDetail.singleStorey" => 'required|integer',
            "exteriorDetail.typeResidence" => 'required|string',
            "exteriorDetail.formatResidence" => 'required|string',
            "exteriorDetail.floor" => 'nullable|integer',
            "exteriorDetail.barbecue" => 'nullable',
            "exteriorDetail.jacuzzi" => 'nullable',
            "exteriorDetail.bikes" => 'nullable',
            "exteriorDetail.tennis" => 'nullable',
            "exteriorDetail.summerKitchen" => 'nullable'
        ];
    }
}
