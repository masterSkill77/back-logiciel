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
            "diagnostique.year_construction" => '',
            "diagnostique.dpe_date_realization" => 'date',
            "diagnostique.pde" => 'nullable|',
            "diagnostique.dpe_consommation" => '',
            "diagnostique.dpe_ges" => '',
            "diagnostique.cost_estimate" => '',
            "diagnostique.ref_year" => '',
            "diagnostique.amiante" => '',
            "diagnostique.amiante_yes_date" => 'nullable',
            "diagnostique.amiante_yes_comments" => 'nullable|',
            "diagnostique.electric" => '',
            "diagnostique.electric_yes_date" => 'nullable|',
            "diagnostique.electric_yes_comments" => 'nullable|',
            "diagnostique.gaz" => '',
            "diagnostique.gaz_yes_date" => 'nullable|',
            "diagnostique.gaz_yes_comments" => 'nullable|',
            "diagnostique.plomb" => '',
            "diagnostique.plomb_yes_date" => 'nullable|',
            "diagnostique.plomb_yes_comments" => 'nullable|',
            "diagnostique.loi_carrez" => 'nullable',
            "diagnostique.loi_carrez_yes_date" => 'nullable|',
            "diagnostique.loi_carrez_yes_comments" => 'nullable|',
            "diagnostique.erp" => '',
            "diagnostique.erp_yes_date" => 'nullable|',
            "diagnostique.erp_yes_comments" => 'nullable|',
            "diagnostique.state_parasitaire" => '',
            "diagnostique.state_parasitaire_yes_date" => 'nullable|',
            "diagnostique.state_parasitaire_yes_comments" => 'nullable|',
            "diagnostique.assainissement" => '',
            "diagnostique.assainissement_yes_date" => 'nullable|',
            "diagnostique.assainissement_yes_comments" => 'nullable|',
        ];
    }
}
