<?php

namespace App;

use Illuminate\Support\Facades\Http;

class ForecastReceiver
{
    const API_WEATHER_URL = 'https://api.openweathermap.org/data/2.5/onecall';
    const API_WEATHER_KEY = '9fa7ebba7495dc607c7c867392b10d6f';

    public static function getDailyForecastFromApi($lat, $lon)
    {
        $response = Http::get(self::API_WEATHER_URL, [
            'lat' => $lat,
            'lon' => $lon,
            'appid' => self::API_WEATHER_KEY,
            'lang' => 'en',
            'exclude' => 'minutely,hourly,alerts,current',
            'units' => 'metric'
        ]);
        return $response->object()->daily;
    }
}
