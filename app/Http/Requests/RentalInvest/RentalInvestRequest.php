<?php

namespace App\Http\Requests\RentalInvest;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\ValidationErrors;

class RentalInvestRequest extends FormRequest
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
            "rentalInvests.estimated_rent"=> 'required|string',
            "rentalInvests.monthly_rent"=> 'required|string',
            "rentalInvests.yeld"=> 'required|string',
            "rentalInvests.occupancy"=> 'required|integer'
        ];
    }
}