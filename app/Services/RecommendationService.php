<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\Http;

class RecommendationService
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getSalesData()
    {
        return $this->orderRepository->getSalesData();
    }

    public function getAIRecommendations($salesData)
    {
        $prompt = "Given this sales data, which products should we promote for higher revenue? " . json_encode($salesData);

         $prompt = 'what is your name';
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('GPT_API_TOKEN'),
            ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo-instruct',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $prompt,
                ],
            ],
            'max_tokens' => 2048,
            'temperature' => 0,
        ]);

        if ($response->successful()) {
            return $response->json()['choices'][0]['text'];
        }

        return 'Failed to get recommendations from AI.';
    }



    public function getWeatherRecommendations($location = 'Cairo')
{
    $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
        'q' => $location,
        'appid' => env('OPENWEATHER_API_KEY'),
        'units' => 'metric',
    ]);

    if ($response->failed()) {
        return 'Unable to fetch weather data. Please check the location or try again later.';
    }

    $weatherData = $response->json();
    $temperature = $weatherData['main']['temp'];
    $condition = $weatherData['weather'][0]['main'];

    if ($temperature > 30) {
        $recommendations = "Promote cold drinks and ice cream.";
        $dynamicPricing = "Increase prices for cold drinks by 10%.";
    } elseif ($temperature < 15) {
        $recommendations = "Promote hot drinks and soups.";
        $dynamicPricing = "Increase prices for hot drinks by 15%.";
    } else {
        $recommendations = "Promote balanced meal options.";
        $dynamicPricing = "Keep prices stable.";
    }

    return [
        'weather' => $weatherData,
        'recommendations' => $recommendations,
        'dynamicPricing' => $dynamicPricing,
    ];
}

}
