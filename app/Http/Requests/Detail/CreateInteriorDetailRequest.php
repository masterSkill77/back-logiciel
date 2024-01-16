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
            "category"=> 'required|json',
            "nbOfSleeping"=> 'required|integer',
            "nbOfBathroom"=> 'required|integer',
            "nbOfRoomWater"=> 'required|integer',
            "nbOfWc"=> 'required|integer',
            "caracteristique"=> 'required|json',
            "surfaceSquare"=> 'required|integer',
            "surfaceStay"=> 'required|integer',
            "TypeOfKitchen"=> 'required|string',
            "StateOfKitchen"=> 'required|integer',

        ];
    }
}