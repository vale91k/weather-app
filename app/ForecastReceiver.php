<?php

namespace App;

use Illuminate\Support\Facades\Http;

class ForecastReceiver
{
    const API_WEATHER_URL = 'https://api.openweathermap.org/data/2.5/onecall';

    public static function getDailyForecastFromApi($lat, $lon)
    {
        $response = Http::get(self::API_WEATHER_URL, [
            'lat' => $lat,
            'lon' => $lon,
            'appid' => env('API_KEY'),
            'lang' => 'en',
            'exclude' => 'minutely,hourly,alerts,current',
            'units' => 'metric'
        ]);
        if ($response->status() != 200) {
            throw new \Exception('Response status from Api is ' . $response->status());
        }
        return $response->object()->daily;
    }
}
