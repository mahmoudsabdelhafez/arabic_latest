<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DeepInfraController extends Controller
{
public function chatWithDeepInfra(Request $request)
{
    // Validate input data
    $request->validate([
        'arabic_letter' => 'required',
        'effect' => 'nullable',
    ]);

    // Concatenate effect and Arabic letter
    $text = trim($request->effect . ' ' . $request->arabic_letter);
    
    // Get API token from .env
    $token = env('DEEPINFRA_TOKEN');

    // Make sure the token exists
    if (!$token) {
        return response()->json(['error' => 'Missing DeepInfra API token'], 500);
    }

    try {
        // Make the API request
        $response = Http::withToken($token)
            ->withHeaders(['Content-Type' => 'application/json'])
            ->post('https://api.deepinfra.com/v1/openai/chat/completions', [
                'model' => 'Qwen/Qwen2.5-72B-Instruct',
                'messages' => [
                    ['role' => 'user', 'content' => 'Give me a description of ' . $text]
                ]
            ]);

        // Check if API request was successful
        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'DeepInfra API error', 'details' => $response->body()], $response->status());
        }
    } catch (\Exception $e) {
        return response()->json(['error' => 'Request failed', 'message' => $e->getMessage()], 500);
    }
}

}