<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Forecast;
use App\WeatherDataManager;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class MainController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return Application|Factory|View
     */
    public function __invoke()
    {
        // TODO сделать проверку по городу и результатам в таблице и только после этого инициализировать заполнение таблицы
        WeatherDataManager::insertInitialData();
        $cityId = City::DEFAULT_CITY_ID;
        $data = [];
        $city = City::find($cityId);
        $data['city'] = $city;
        // TODO сделать проверку на наличие результатов
        $data['weatherData'] = Forecast::where('city_id', $cityId)->get();
        return view('home', $data);
    }
}
