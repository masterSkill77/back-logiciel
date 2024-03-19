<?php

namespace App\Services;

use App\Models\Folder;
use App\Models\Step;

class GenerateStepService
{
    public function __construct()
    {
        // Constructor of the class
    }

    public function generateVenteStep(Folder $folder)
    {
        $data = [
            [
                'active' => true,
                'step_duration' => 0,
                'folder_id' => $folder->id,
                'step_date' => $folder->date_signature,
                'step_name' => "DATE COMPROMIS"
            ], [
                'active' => true,
                'step_duration' => 0,
                'folder_id' => $folder->id,
                'step_date' => $folder->date_signature,
                'step_name' => "ENVOI SRU"
            ], [
                'active' => true,
                'step_duration' => 12,
                'folder_id' => $folder->id,
                'step_date' => $folder->date_signature,
                'step_name' => "ENVOI NOTAIRE"
            ], [
                'active' => true,
                'step_duration' => 13,
                'folder_id' => $folder->id,
                'step_date' => $folder->date_signature,
                'step_name' => "RÉCEPTION NOTAIRE"
            ], [
                'active' => true,
                'step_duration' => 45,
                'folder_id' => $folder->id,
                'step_date' => $folder->date_signature,
                'step_name' => "STATUT PRÊT"
            ], [
                'active' => true,
                'step_duration' => 90,
                'folder_id' => $folder->id,
                'step_date' => $folder->date_signature,
                'step_name' => "SIGNATURE ACTE"
            ]
        ];

        foreach ($data as $step) {
            Step::create($step);
        }
    }

    public function generateLocationOrGestionStep(Folder $folder)
    {
        $data = [
            [
                'active' => true,
                'step_duration' => 0,
                'folder_id' => $folder->id,
                'step_date' => $folder->date_signature,
                'step_name' => "SIGNATURE BAIL"
            ], [
                'active' => true,
                'step_duration' => 0,
                'folder_id' => $folder->id,
                'step_date' => $folder->date_signature,
                'step_name' => "DÉBUT DU BAIL"
            ], [
                'active' => true,
                'step_duration' => 12,
                'folder_id' => $folder->id,
                'step_date' => $folder->date_signature,
                'step_name' => "ÉTAT DES LIEUX ENTRÉE"
            ], [
                'active' => true,
                'step_duration' => 13,
                'folder_id' => $folder->id,
                'step_date' => $folder->date_signature,
                'step_name' => "FIN DE BAIL"
            ], [
                'active' => true,
                'step_duration' => 45,
                'folder_id' => $folder->id,
                'step_date' => $folder->date_signature,
                'step_name' => "ÉTAT DES LIEUX SORTIE"
            ], [
                'active' => true,
                'step_duration' => 90,
                'folder_id' => $folder->id,
                'step_date' => $folder->date_signature,
                'step_name' => "RECEPTION DU BIEN"
            ]
        ];

        foreach ($data as $step) {
            Step::create($step);
        }
    }
}
