<?php

namespace App;

use App\Models\City;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class WeatherDataManager
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

    public static function insertInitialData($cityId = City::DEFAULT_CITY_ID)
    {
        $city = City::find($cityId);
        $dailyData = self::getDailyForecastFromApi($city['lat'], $city['lon']);
        foreach ($dailyData as $dayData) {
            DB::table('forecasts')->insert([
                'city_id' => City::DEFAULT_CITY_ID,
                'date' => date('Y-m-d H:i:s', $dayData->dt),
                'temp' => $dayData->temp->day,
                'clouds' => $dayData->clouds
            ]);
        }
    }
}
