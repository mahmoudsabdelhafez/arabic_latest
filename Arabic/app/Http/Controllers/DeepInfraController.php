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
            'arabic_letter_id' => 'required',
            'arabic_diacritic_id' => 'required'
        ]);

        // Example input text (you can modify based on request data)
        $text = 'ب حرف جر';  

        // Get API token from .env file
        $token = 'vrnurh2a8iNitno93ay53mCUtNMB68Wm';

        if (!$token) {
            return response()->json(['error' => 'Missing DeepInfra API token'], 500);
        }

        try {
            // Make the API request
            $response = Http::withToken($token)
                ->withHeaders(['Content-Type' => 'application/json'])
                ->withOptions(['verify' => false]) // Disable SSL verification if needed
                ->post('https://api.deepinfra.com/v1/openai/chat/completions', [
                    'model' => 'Qwen/Qwen2.5-72B-Instruct',
                    'messages' => [
                        ['role' => 'user', 'content' => 'اعطيني شرح مختصر ومفيد عن : ' . $text]
                    ]
                ]);

            // Check if API request was successful
            if ($response->successful()) {
                $data = $response->json();

                // Extract the actual message content
                $message = $data['choices'][0]['message']['content'] ?? 'لم يتم العثور على شرح';

                return response()->json(['description' => $message]);
            } else {
                return response()->json([
                    'error' => 'DeepInfra API error',
                    'details' => $response->json()
                ], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Request failed', 'message' => $e->getMessage()], 500);
        }
    }
}
