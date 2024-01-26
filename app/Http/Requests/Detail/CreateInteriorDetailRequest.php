<?php

namespace App\Http\Requests\Detail;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\ValidationErrors;

class CreateInteriorDetailRequest extends FormRequest
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
            "interiorDetail.category"=> 'nullable|array',
            "interiorDetail.nbOfSleeping"=> 'nullable|integer',
            "interiorDetail.nbOfBathroom"=> 'nullable|integer',
            "interiorDetail.nbOfRoomWater"=> 'nullable|integer',
            "interiorDetail.nbOfWc"=> 'nullable|integer',
            "interiorDetail.caracteristique"=> 'nullable|array',
            "interiorDetail.surfaceSquare"=> 'nullable|integer',
            "interiorDetail.surfaceStay"=> 'nullable|integer',
            "interiorDetail.TypeOfKitchen"=> 'nullable|string',
            "interiorDetail.StateOfKitchen"=> 'nullable|integer',

        ];
    }
}