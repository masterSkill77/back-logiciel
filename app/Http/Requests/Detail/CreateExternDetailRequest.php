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
            "semiOwnership"=> 'required|string',
            "withbasement"=> 'required|integer',
            "cellar"=> 'required|integer',
            "trueCellar"=> 'required|integer',
            "balcony"=> 'required|integer',
            "withBalcony"=> 'required|integer',
            "terrace"=> 'required|integer',
            "withTerrace"=> 'required|integer',
            "varangue"=> 'required|integer',
            "loggia"=> 'required|integer',
            "veranda"=> 'required|integer',
            "withVeranda"=> 'required|integer',
            "singleStorey"=> 'required|integer',
            "typeResidence"=> 'required|string',
            "formatResidence"=> 'required|string'
        ];
    }
}