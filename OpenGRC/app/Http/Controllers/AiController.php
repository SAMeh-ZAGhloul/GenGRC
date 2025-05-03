<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\HtmlString;

class AiController extends Controller
{
    public static function getControlSuggestions($record)
    {
        $client = new \GuzzleHttp\Client;
        $key = Crypt::decryptString(setting('ai.openai_key'));
        $response = $client->request('POST', 'https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => "Bearer {$key}",
            ],
            'json' => [
                'model' => 'gpt-4o-mini',
                'store' => true,
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are a security professional working on a security control implementation. You need to write a 1 paragraph sample implementation in plain text for a security control with the following description '.$record['description'],
                    ],
                    [
                        'role' => 'user',
                        'content' => 'How can I implement the following control description? '.$record['description'],
                    ],
                ],
            ],
        ]);
        $body = $response->getBody();
        $data = json_decode($body, true);

        return new HtmlString($data['choices'][0]['message']['content']);
    }
}
