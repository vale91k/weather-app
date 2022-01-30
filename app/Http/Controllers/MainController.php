<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Forecast;
use App\ForecastReceiver;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class MainController extends Controller
{
    /**
     * Главная страница.
     *
     * @return Application|Factory|View
     * @throws \Exception
     */
    public function index()
    {
        $cityId = City::DEFAULT_CITY_ID;
        $data = $this->getDataByCityId($cityId);
        return view('home', $data);
    }

    /**
     * Детальная страница по городу
     * @return Application|Factory|View
     * @throws \Exception
     */
    public function detail(City $city)
    {
        $data = $this->getDataByCityId($city->id);
        return view('home', $data);
    }

    /**
     * Отдаёт данные в зависимости от входящего города
     * @return Application|Factory|View
     * @throws \Exception
     */
    private function getDataByCityId($cityId): array
    {
        $res = [];
        $res['city'] = City::find($cityId);
        $res['weatherData'] = Forecast::getForecastByCityId($cityId);
        return $res;
    }
}
