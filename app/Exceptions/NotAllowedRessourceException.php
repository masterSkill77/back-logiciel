<?php

namespace App\Exceptions;

use Exception;

class NotAllowedRessourceException extends Exception
{
    public function report()
    {
        return response()->json(['error' => 'NOT_ALLOWED_RESSOURCE', 'message' => "Vous n'avez les autorisations suffisantes pour accéder à ce ressource, la ressource étant pour une autre agence que la votre"], 403);
    }
}
