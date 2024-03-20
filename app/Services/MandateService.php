<?php

namespace App\Services;

use App\Models\Mandate;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;

class MandateService
{
    public function __construct()
    {
        // Constructor of the class
    }
    public function addMandate(array $mandate): int
    {
        $existingMandate = Mandate::where('num_mandat', $mandate['num_mandat'])->first();
        if ($existingMandate) {
           isset($mandate['contact_id_contact']) ?? $existingMandate->contact_id_contact = $mandate['contact_id_contact'];
           isset($mandate['bien_id_bien']) ?? $existingMandate->bien_id_bien = $mandate['bien_id_bien'];
            $existingMandate->save();
            return $existingMandate->id_mandate;

        } else {
            
            $newMandate = new Mandate($mandate);
            $newMandate->save();

            return $newMandate->id_mandate;
        }
    }

    public function getMandate(): Collection
    {
        return Mandate::all();
    }

    public function udpateMandate(array $mandate)
    {
        $Mandate = Mandate::where('contact_id_contact', $mandate['contact_id_contact'])->first();
        if($Mandate) {
            return $Mandate->update(['bien_id_bien' => $mandate['bien_id_bien']]);
        }
        return false;
    }
}
