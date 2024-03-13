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
            $existingMandate->contact_id_contact = $mandate['contact_id_contact'];
            $existingMandate->save();
    
            return $existingMandate->id_mandate;
        } else {
            $newMandate = new Mandate($mandate);
            $newMandate->save();
    
            return $newMandate->id_mandate;
        }
    } 

    public function getMandate() : Collection
    {
        return Mandate::all();
    }
}
