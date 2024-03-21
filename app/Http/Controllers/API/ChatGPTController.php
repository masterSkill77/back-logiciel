<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Annonce\AnnonceRequest;
use App\Services\OpenAiService;
use App\Services\TypeEstateService;
use App\Services\TypeOffertService;
use Orhanerday\OpenAi\OpenAi;

class ChatGPTController extends Controller
{
    public function __construct(public OpenAiService $openAiService, public TypeEstateService $typeEstateService, public TypeOffertService $typeOffertService)
    {
        
    }
    public function chatGPT(AnnonceRequest $annonceRequest)
    {
        $annonces = $annonceRequest->toArray();
        $offert = $this->typeOffertService->getById($annonces['type_offert_id']);
        $estate = $this->typeEstateService->getById($annonces['type_estate_id']);
        $chat = $this->openAiService->useOpenAi($annonces, $offert['designation'], $estate['designation'], );
        $data = json_decode($chat, true);

        return response()->json(['response' =>$data['choices'][0]['message']['content']]);
    }
}
