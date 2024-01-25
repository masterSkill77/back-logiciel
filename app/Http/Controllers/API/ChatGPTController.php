<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Orhanerday\OpenAi\OpenAi;
use Illuminate\Http\Request;

class ChatGPTController extends Controller
{
    public function chat(Request $request)
    {
        $open_ai_key = getenv('OPENAI_API_KEY');
        $open_ai = new OpenAi($open_ai_key);

        $chat = $open_ai->chat([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    "role" => "user",
                    "content" => "Who won the world series in 2020?"
                ]
            ]
        ]);

        $data = json_decode($chat, true);

        return response()->json(['response' => $data['choices'][0]['message']['content']]);
    }
}
