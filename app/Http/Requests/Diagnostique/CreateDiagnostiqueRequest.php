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
            "diagnostique.year_construction"=> 'required|integer',
            "diagnostique.dpe_date_realization"=> 'required|date',
            "diagnostique.dpe_property"=> 'required|boolean',
            "diagnostique.dpe_virgin"=> 'required|boolean',
            "diagnostique.dpe_consommation"=> 'required|string',
            "diagnostique.dpe_ges"=> 'required|string',
            "diagnostique.cost_estimate"=> 'required|integer',
            "diagnostique.ref_year"=> 'required|integer',
            "diagnostique.amiante"=> 'required|integer',
            "diagnostique.amiante_yes_date"=> 'required|date',
            "diagnostique.amiante_yes_comments"=> 'required|string',
            "diagnostique.electric"=> 'required|integer',
            "diagnostique.electric_yes_date"=> 'required|integer',
            "diagnostique.electric_yes_comments"=> 'required|integer',
            "diagnostique.gaz"=> 'required|integer',
            "diagnostique.gaz_yes_date"=> 'required|integer',
            "diagnostique.gaz_yes_comments"=> 'required|integer',
            "diagnostique.plomb"=> 'required|integer',
            "diagnostique.plomb_yes_date"=> 'required|integer',
            "diagnostique.plomb_yes_comments"=> 'required|string',
            "diagnostique.loi_carrez"=> 'required|integer',
            "diagnostique.loi_carrez_yes_date"=> 'required|integer',
            "diagnostique.loi_carrez_yes_comments"=> 'required|string',
            "diagnostique.erp"=> 'required|integer',
            "diagnostique.erp_yes_date"=> 'required|integer',
            "diagnostique.erp_yes_comments"=> 'required|string',
            "diagnostique.state_parasitaire"=> 'required|integer',
            "diagnostique.state_parasitaire_yes_date"=> 'required|integer',
            "diagnostique.state_parasitaire_yes_comments"=> 'required|string',
            "diagnostique.assainissement"=> 'required|integer',
            "diagnostique.assainissement_yes_date"=> 'required|integer',
            "diagnostique.assainissement_yes_comments"=> 'required|string',
        ];
    }
}