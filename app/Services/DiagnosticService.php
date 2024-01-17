<?php

namespace App\Services;

use App\Models\Diagnostic;
use Illuminate\Database\Eloquent\Collection;

class DiagnosticService
{
    public function __construct()
    {
        // Constructor of the class
    }


    public function createDiagnostic(array $params): int
    {
        if (isset($params['diagnostique']) && is_array($params['diagnostique'])) {
            $Diagnostic = (new Diagnostic($params['diagnostique']));
            $Diagnostic->save();
            return $Diagnostic->id;
        }

        return 0;
    }

    /**
     * Update an Diagnostic row based on infoId
     * @param \App\Models\Diagnostic $Diagnostic
     * @param array $params
     * @return \App\Models\Diagnostic
     */

    public function updateDiagnostic(Diagnostic $Diagnostic, array $params): Diagnostic
    {
        $Diagnostic->update($params);
        return $Diagnostic;
    }


    public function getDiagnostic() : Collection
    {
        return Diagnostic::all();
    }
}
