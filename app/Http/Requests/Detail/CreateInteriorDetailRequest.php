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
            "interiorDetail.category"=> 'required|array',
            "interiorDetail.nbOfSleeping"=> 'required|integer',
            "interiorDetail.nbOfBathroom"=> 'required|integer',
            "interiorDetail.nbOfRoomWater"=> 'required|integer',
            "interiorDetail.nbOfWc"=> 'required|integer',
            "interiorDetail.caracteristique"=> 'required|array',
            "interiorDetail.surfaceSquare"=> 'required|integer',
            "interiorDetail.surfaceStay"=> 'required|integer',
            "interiorDetail.TypeOfKitchen"=> 'required|string',
            "interiorDetail.StateOfKitchen"=> 'required|integer',

        ];
    }
}