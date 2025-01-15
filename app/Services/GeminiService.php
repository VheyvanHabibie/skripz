<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class GeminiService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = env('GEMINI_API_KEY');
        $this->baseUrl = env('GEMINI_BASE_URL');
    }

    public function generateContent($text)
    {
        $url = "{$this->baseUrl}/models/gemini-1.5-flash-latest:generateContent?key={$this->apiKey}";

        $payload = [
            "contents" => [
                [
                    "parts" => [
                        ["text" => $text],
                    ],
                ],
            ],
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($url, $payload);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Error connecting to Gemini API: ' . $response->body());
    }
}
