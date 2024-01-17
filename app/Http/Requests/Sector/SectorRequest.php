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
            "sectors.advertised_country"=> 'required|string',
            "sectors.public_zap"=> 'required|string',
            "sectors.public_country"=> 'required|string',
            "sectors.private_zap"=> 'required|string',
            "sectors.private_country"=> 'required|string',
            "sectors.property_address"=> 'required|string',
            "sectors.address_completed"=> 'required|string',
            "sectors.building"=> 'required|string',
            "sectors.prox_service"=> 'required|string',
            "sectors.environment"=> 'required|string',
            "sectors.map"=> 'required|array'
        ];
    }
}