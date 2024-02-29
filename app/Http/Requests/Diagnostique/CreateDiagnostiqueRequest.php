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
            "diagnostique.year_construction"=> 'nullable|integer',
            "diagnostique.dpe_date_realization"=> 'nullable|date',
            "diagnostique.dpe_property"=> 'nullable|boolean',
            "diagnostique.dpe_virgin"=> 'nullable|boolean',
            "diagnostique.dpe_consommation"=> 'nullable|string',
            "diagnostique.dpe_ges"=> 'nullable|string',
            "diagnostique.cost_estimate"=> 'nullable|integer',
            "diagnostique.ref_year"=> 'nullable|integer',
            "diagnostique.amiante"=> 'nullable|integer',
            "diagnostique.amiante_yes_date"=> 'nullable|date',
            "diagnostique.amiante_yes_comments"=> 'nullable|string',
            "diagnostique.electric"=> 'nullable|integer',
            "diagnostique.electric_yes_date"=> 'nullable|integer',
            "diagnostique.electric_yes_comments"=> 'nullable|integer',
            "diagnostique.gaz"=> 'nullable|integer',
            "diagnostique.gaz_yes_date"=> 'nullable|integer',
            "diagnostique.gaz_yes_comments"=> 'nullable|integer',
            "diagnostique.plomb"=> 'nullable|integer',
            "diagnostique.plomb_yes_date"=> 'nullable|integer',
            "diagnostique.plomb_yes_comments"=> 'nullable|string',
            "diagnostique.loi_carrez"=> 'nullable|integer',
            "diagnostique.loi_carrez_yes_date"=> 'nullable|integer',
            "diagnostique.loi_carrez_yes_comments"=> 'nullable|string',
            "diagnostique.erp"=> 'nullable|integer',
            "diagnostique.erp_yes_date"=> 'nullable|integer',
            "diagnostique.erp_yes_comments"=> 'nullable|string',
            "diagnostique.state_parasitaire"=> 'nullable|integer',
            "diagnostique.state_parasitaire_yes_date"=> 'nullable|integer',
            "diagnostique.state_parasitaire_yes_comments"=> 'nullable|string',
            "diagnostique.assainissement"=> 'nullable|integer',
            "diagnostique.assainissement_yes_date"=> 'nullable|integer',
            "diagnostique.assainissement_yes_comments"=> 'nullable|string',
        ];
    }
}