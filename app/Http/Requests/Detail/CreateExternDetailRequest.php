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
            "exteriorDetail.semiOwnership"=> 'required|string',
            "exteriorDetail.basement"=> 'required|string',
            "exteriorDetail.withbasement"=> 'nullable|integer',
            "exteriorDetail.cellar"=> 'required|integer',
            "exteriorDetail.trueCellar"=> 'nullable|integer',
            "exteriorDetail.balcony"=> 'required|integer',
            "exteriorDetail.withBalcony"=> 'nullable|integer',
            "exteriorDetail.terrace"=> 'required|integer',
            "exteriorDetail.withTerrace"=> 'nullable|integer',
            "exteriorDetail.varangue"=> 'required|integer',
            "exteriorDetail.loggia"=> 'required|integer',
            "exteriorDetail.veranda"=> 'required|integer',
            "exteriorDetail.withVeranda"=> 'nullable|integer',
            "exteriorDetail.singleStorey"=> 'required|integer',
            "exteriorDetail.typeResidence"=> 'required|string',
            "exteriorDetail.formatResidence"=> 'required|string',
            "exteriorDetail.barbecue"=> 'nullable|integer',
            "exteriorDetail.jacuzzi"=> 'nullable|integer',
            "exteriorDetail.bikes"=> 'nullable|integer',
            "exteriorDetail.tennis"=> 'nullable|integer',
            "exteriorDetail.summerKitchen"=> 'nullable|integer'
        ];
    }
}