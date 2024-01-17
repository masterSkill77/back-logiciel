<?php

namespace App\Http\Requests\Photos;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\ValidationErrors;

class PhotoRequest extends FormRequest
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
            "photos_original"=> 'required|string',
            "photos_slide"=> 'required|array'
        ];
    }
}