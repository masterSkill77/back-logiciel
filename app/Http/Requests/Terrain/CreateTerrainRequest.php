<?php

namespace App\Http\Requests\Terrain;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\ValidationErrors;

class CreateTerrainRequest extends FormRequest
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
            "terrain.ground"=> 'required|array',
            "terrain.ground_print"=> 'nullable|string',
            "terrain.ground_print_residual"=> 'nullable|string',
            "terrain.shon"=> 'nullable|string',
            "terrain.ces"=> 'nullable|string',
            "terrain.codification_plu"=> 'nullable|string',
            "terrain.right_way"=> 'nullable|string',
            "terrain.cadastral_ref"=> 'nullable|string',
        ];
    }
}