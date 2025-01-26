<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather-Based Recommendations</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white shadow-md rounded-lg p-8">
        <h1 class="text-2xl font-bold mb-4">Weather-Based Recommendations</h1>

        @if (isset($error))
            <p class="text-red-500">{{ $error }}</p>
        @else
            <h2 class="text-xl font-semibold">Current Weather in {{ $weather['name'] }}</h2>
            <p class="text-lg"><strong>Temperature:</strong> {{ $weather['main']['temp'] }}°C</p>
            <p class="text-lg"><strong>Condition:</strong> {{ $weather['weather'][0]['description'] }}</p>

            <h2 class="text-xl font-semibold mt-6">Recommendations</h2>
            <p>{{ $recommendations }}</p>

            <h2 class="text-xl font-semibold mt-6">Dynamic Pricing</h2>
            <p>{{ $dynamicPricing }}</p>
        @endif

        <form method="GET" action="/recommendations/weather" class="mt-6">
            <input type="text" name="location" placeholder="Enter location" class="border rounded p-2 w-full">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Get Recommendations</button>
        </form>
    </div>
</body>
</html>
