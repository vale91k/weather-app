<?php

namespace App\Models;

use App\ForecastReceiver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Forecast extends Model
{
    use HasFactory;

    const MIN_FORECAST_ROWS = 8;

    public static function getForecastByCityId($cityId = City::DEFAULT_CITY_ID)
    {
        $res = self::where([
            ['city_id', $cityId],
            ['date', '>=', Carbon::today()]
        ])->get();
        if ($res->count() < self::MIN_FORECAST_ROWS) {
            self::cleanDataByCityId($cityId);
            self::insertDataFromApi($cityId);
            $res = self::where('city_id', $cityId)->whereDate('date', '>=', Carbon::now())->get();
        }
        return $res;
    }

    public static function insertDataFromApi($cityId = City::DEFAULT_CITY_ID)
    {
        $city = City::find($cityId);
        $dailyData = ForecastReceiver::getDailyForecastFromApi($city['lat'], $city['lon']);
        foreach ($dailyData as $dayData) {

            DB::table('forecasts')->insert([
                'city_id' => City::DEFAULT_CITY_ID,
                'date' => date('Y-m-d H:i:s', $dayData->dt),
                'temp' => $dayData->temp->day,
                'clouds' => $dayData->clouds
            ]);
        }
    }

    public static function cleanDataByCityId($cityId)
    {
        self::where('city_id', $cityId)->delete();
    }
}
