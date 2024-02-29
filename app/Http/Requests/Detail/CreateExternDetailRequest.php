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
            "exteriorDetail.semiOwnership"=> 'string',
            "exteriorDetail.basement"=> 'string',
            "exteriorDetail.withbasement"=> 'nullable|integer',
            "exteriorDetail.cellar"=> 'nullable|integer',
            "exteriorDetail.trueCellar"=> 'nullable|integer',
            "exteriorDetail.balcony"=> 'integer',
            "exteriorDetail.withBalcony"=> 'nullable|integer',
            "exteriorDetail.terrace"=> 'integer',
            "exteriorDetail.withTerrace"=> 'nullable|integer',
            "exteriorDetail.varangue"=> 'integer',
            "exteriorDetail.loggia"=> 'integer',
            "exteriorDetail.veranda"=> 'integer',
            "exteriorDetail.withVeranda"=> 'nullable|integer',
            "exteriorDetail.singleStorey"=> 'integer',
            "exteriorDetail.typeResidence"=> 'string',
            "exteriorDetail.formatResidence"=> 'string'
        ];
    }
}