<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ChatGPTController extends Controller
{
    public function chat(Request $request)
    {
        $client = new Client();

        $response = $client->post('https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . config('services.openai.key'),
            ],
            'json' => [
                'model' => 'text-davinci-003',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a helpful assistant.']
                ],
            ],
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        return response()->json(['response' => $data['choices'][0]['message']['content']]);
    }
}
