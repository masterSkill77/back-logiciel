<?php

namespace App\Http\Requests\Diagnostique;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\ValidationErrors;

class CreateDiagnostiqueRequest extends FormRequest
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
            "year_construction"=> 'required|integer',
            "dpe_date_realization"=> 'required|date',
            "dpe_property"=> 'required|boolean',
            "dpe_virgin"=> 'required|boolean',
            "dpe_consommation"=> 'required|string',
            "dpe_ges"=> 'required|string',
            "cost_estimate"=> 'required|integer',
            "ref_year"=> 'required|integer',
            "amiante"=> 'required|integer',
            "amiante_yes_date"=> 'required|date',
            "amiante_yes_comments"=> 'required|string',
            "electric"=> 'required|integer',
            "electric_yes_date"=> 'required|integer',
            "electric_yes_comments"=> 'required|integer',
            "gaz"=> 'required|integer',
            "gaz_yes_date"=> 'required|integer',
            "gaz_yes_comments"=> 'required|integer',
            "plomb"=> 'required|integer',
            "plomb_yes_date"=> 'required|integer',
            "plomb_yes_comments"=> 'required|string',
            "loi_carrez"=> 'required|integer',
            "loi_carrez_yes_date"=> 'required|integer',
            "loi_carrez_yes_comments"=> 'required|string',
            "erp"=> 'required|integer',
            "erp_yes_date"=> 'required|integer',
            "erp_yes_comments"=> 'required|string',
            "state_parasitaire"=> 'required|integer',
            "state_parasitaire_yes_date"=> 'required|integer',
            "state_parasitaire_yes_comments"=> 'required|string',
            "assainissement"=> 'required|integer',
            "assainissement_yes_date"=> 'required|integer',
            "assainissement_yes_comments"=> 'required|string',
        ];
    }
}