<?php

namespace App\Http\Controllers;

use App\Models\City;
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

        return view('home', $data);
    }
}
