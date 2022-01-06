<?php

namespace App\Models;

use App\WeatherDataManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Forecast extends Model
{
    use HasFactory;

    public static function getForecastByCityId($cityId = City::DEFAULT_CITY_ID)
    {
        // TODO добавить проверку на время и кол-во результатов
        $res = Forecast::where('city_id', $cityId)->get();
        if ($res->isEmpty()) {
            self::insertDataFromApi($cityId);
            $res = Forecast::where('city_id', $cityId)->get();
        }
        return $res;
    }

    public static function insertDataFromApi($cityId = City::DEFAULT_CITY_ID)
    {
        $city = City::find($cityId);
        // TODO добавлять обновление результатов прогноза погоды?
        $dailyData = WeatherDataManager::getDailyForecastFromApi($city['lat'], $city['lon']);
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
