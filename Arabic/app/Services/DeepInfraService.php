<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DeepInfraService
{
    protected $token;

    public function __construct()
    {
        $this->token = env('DEEPINFRA_API_TOKEN', 'fs0RKKU18u7SjkAbmEaNk3ro0S1n31b4'); // استدعاء الـ API Token من .env
    }

    public function chatWithDeepInfra($text)
    {
        if (!$this->token) {
            return ['error' => 'Missing DeepInfra API token'];
        }

        try {
            $response = Http::withToken($this->token)
                ->withHeaders(['Content-Type' => 'application/json'])
                ->withOptions(['verify' => false]) // تعطيل التحقق من SSL
                ->post('https://api.deepinfra.com/v1/openai/chat/completions', [
                    'model' => 'Qwen/Qwen2.5-72B-Instruct',
                    'messages' => [
                        ['role' => 'user', 'content' => 'اعطيني شرح مختصر ومفيد عن : ' . $text]
                    ]
                ]);

            return $response->successful() ? $response->json() : ['error' => 'DeepInfra API error', 'details' => $response->body()];
        } catch (\Exception $e) {
            return ['error' => 'Request failed', 'message' => $e->getMessage()];
        }
    }
}
