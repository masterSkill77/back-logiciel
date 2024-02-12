<?php

namespace App\Exceptions;

use Exception;

class NotAllowedRessourceException extends Exception
{
    public function report()
    {
        return response()->json(['error' => 'NOT_ALLOWED_RESSOURCE', 'message' => "Vous n'avez les autorisations suffisantes pour accéder à ce ressource"], 403);
    }
}
