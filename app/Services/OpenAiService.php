<?php

namespace App\Services;

use Orhanerday\OpenAi\OpenAi;

class OpenAiService
{
    public function useOpenAi($annonces, $offert, $estate)
    {
        $open_ai_key = getenv('OPENAI_API_KEY');
        $open_ai = new OpenAi($open_ai_key);

        $chat = $open_ai->chat([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    "role" => "user",
                    "content" => "Je veux une description d'annonce basée sur les critères suivantes:
                                    Une " . $offert . " de " . $estate .
                                    "dont le prix est de " . $annonces['publish_price'] .
                                    "euro, sa surface habitable est de " . $annonces['living_area'] ."m².
                                    J'aimerais que cette offre soit dans la ville de " . $annonces['city'] . ".Avec ou sans jardin,
                                    avoir de la piscine, possédant du garage ou parking. Je veux aussi savoir le nombre de salle de bains,
                                    les équipements cuisinières. Une". $estate . "avec de la terasse. Son mode de chauffage en indiquant le format et le type d'énergie utilisé.
                                    S'il y a de climatisation aussi et des volets electriques."
                ]
            ]
        ]);

        return $chat;
    }
}
