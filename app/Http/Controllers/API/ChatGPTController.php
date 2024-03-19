<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Annonce\AnnonceRequest;
use App\Services\OpenAiService;
use App\Services\TypeEstateService;
use Orhanerday\OpenAi\OpenAi;

class ChatGPTController extends Controller
{
    public function __construct(public OpenAiService $openAiService, public TypeEstateService $typeEstateService)
    {
        
    }
    public function chatGPT(AnnonceRequest $annonceRequest)
    {
        var_dump($annonceRequest);die;
        $annonces = $annonceRequest->toArray();
        $offert = $this->typeEstateService->getById($annonces['type_offert_id']);
        var_dump($offert);
        die;
        $chat = $this->openAiService->useOpenAi($annonces);
        $data = json_decode($chat, true);

        return response()->json(['response' => $data['choices'][0]['message']['content']]);
    }
}
