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
            "sectors.advertised_country"=> 'nullable|string',
            "sectors.public_zap"=> 'nullable|string',
            "sectors.public_country"=> 'nullable|string',
            "sectors.private_zap"=> 'nullable|string',
            "sectors.private_country"=> 'nullable|string',
            "sectors.property_address"=> 'nullable|string',
            "sectors.address_completed"=> 'nullable|string',
            "sectors.building"=> 'nullable|string',
            "sectors.prox_service"=> 'nullable|string',
            "sectors.environment"=> 'nullable|string'
        ];
    }
}