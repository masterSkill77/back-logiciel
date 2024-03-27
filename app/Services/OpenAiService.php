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
                    "content" => "Je veux une belle description d'annonce pour un agent immobilier dont les informations sont les suivantes: Type d'offre $offert, le type du bien $estate ainsi que les autres componsants dans le JSON qui suit" . json_encode($annonces) . ". Je veux que tu proposes au mieu le bien, avec ses adresses et tout, et incluts les prix et autres contenu du JSON"
                ]
            ]
        ]);

        return $chat;
    }
}
