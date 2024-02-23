<?php

namespace App\Services;

use App\Models\Favorie;

class FavoryService
{
    public function __construct()
    {
        // Constructor of the class
    }

    /**
     * Create or remove favory from database
     * Inject all this directly here to save more function
     */
    public function createOrRemoveFavory(int $favoryId = null, int $userId = null, int $pigeId = null): mixed
    {
        if ($favoryId) {
            return Favorie::where('id', $favoryId)->first()->delete();
        }
        $favory = new Favorie([
            'user_id' => $userId,
            'pige_id' => $pigeId
        ]);
        $favory->save();

        return $favory;
    }
}
