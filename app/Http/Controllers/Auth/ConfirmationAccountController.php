<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;

class ConfirmationAccountController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->query('key');
        if (!$user) {
            return view('errors.validation', ['error' => "La clé n'est pas disponible sur votre requête"]);
        } else {
            try {
                $decryptedUser = json_decode(Crypt::decryptString($user), true);
                $user = User::where('id', $decryptedUser['id'])->first();
                if ($user) {
                    $user->email_verified_at = now();
                    $user->save();
                    return view('validated');
                }
                return view('errors.validation', ['error' => "L'utilisateur n'existe pas"]);
            } catch (Exception $e) {
                return view('errors.validation', ['error' => "L'utilisateur n'existe pas"]);
            }
        }
    }
}
