<?php

namespace App\Http\Requests\Sector;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\ValidationErrors;

class SectorRequest extends FormRequest
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
            "advertised_country"=> 'required|string',
            "public_zap"=> 'required|string',
            "public_country"=> 'required|string',
            "private_zap"=> 'required|string',
            "private_country"=> 'required|string',
            "property_address"=> 'required|string',
            "address_completed"=> 'required|string',
            "building"=> 'required|string',
            "prox_service"=> 'required|string',
            "environment"=> 'required|string',
            "map"=> 'required|json'
        ];
    }
}