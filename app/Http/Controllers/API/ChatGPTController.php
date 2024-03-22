<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Annonce\AnnonceRequest;
use Orhanerday\OpenAi\OpenAi;

class ChatGPTController extends Controller
{
    public function chat(AnnonceRequest $annonceRequest)
    {
        $annonces = $annonceRequest->toArray();
       
        $open_ai_key = getenv('OPENAI_API_KEY');
        $open_ai = new OpenAi($open_ai_key);

        $chat = $open_ai->chat([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    "role" => "user",
                    "content" => "Je veux une description d'annonce basée sur les critères suivantes:
                                    Une " . $annonces['type_offert'] . " de " . $annonces['type_estate'] .
                                    "dont le budget est entre " . $annonces['min_budget'] . " à "  . $annonces['max_budget'] .
                                    "euro, sa surface habitable varie entre " . $annonces['min_living_area'] . " - " . $annonces['max_living_area'] .
                                    "m², avec" . $annonces['min_part_number'] . " à "  . $annonces['max_part_number'] . " pièces.
                                    J'aimerais que cette offre soit dans la ville de " . $annonces['city'] . ".Avec ou sans jardin,
                                    avoir de la piscine, possédant du garage ou parking. Je veux aussi savoir le nombre de salle de bains,
                                    les équipements cuisinières. Une". $annonces['type_estate'] . "avec de la terasse. Son mode de chauffage en indiquant le format et le type d'énergie utilisé.
                                    S'il y a de climatisation aussi et des volets electriques."
                ]
            ]
        ]);

        $data = json_decode($chat, true);

        return response()->json(['response' => $data['choices'][0]['message']['content']]);
    }
}
