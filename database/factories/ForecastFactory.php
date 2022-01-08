<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ForecastFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => rand(1, 100),
            'city_id' =>  1,
            'date' => Carbon::today()->toDateString(),
            'temp' => (rand(-100,100)+ 0.01 *(rand(1,100))),
            'clouds' => rand(1,100),
        ];
    }
}
