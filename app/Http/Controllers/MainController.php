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
        $data = [];
        $cityId = City::DEFAULT_CITY_ID;
        $data['city'] = City::find($cityId);
        $data['weatherData'] = Forecast::getForecastByCityId($cityId);
        return view('home', $data);
    }
}
