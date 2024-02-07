<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Annonce\AnnonceRequest;
use App\Services\OpenAiService;
use Orhanerday\OpenAi\OpenAi;

class ChatGPTController extends Controller
{
    public function __construct(public OpenAiService $openAiService)
    {
        
    }
    public function chat(AnnonceRequest $annonceRequest)
    {
        $annonces = $annonceRequest->toArray();
        $chat = $this->openAiService->useOpenAi($annonces);
        $data = json_decode($chat, true);

        return response()->json(['response' => $data['choices'][0]['message']['content']]);
    }
}
