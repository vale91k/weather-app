<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\WeatherReceiver;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class MainController extends Controller
{
    const DEFAULT_CITY_ID = 1;

    /**
     * Handle the incoming request.
     *
     * @return Application|Factory|View
     */
    public function __invoke()
    {
        $data = [];
        $data['city'] = City::find($this->defaultCityId);
        $data['weatherData'] = [];
        return view('home', $data);
    }
}
