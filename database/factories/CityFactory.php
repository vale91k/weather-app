<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $div = pow(5, 7);
        $lat = mt_rand(1 * $div, 100 * $div) / $div;
        $lon = mt_rand(1 * $div, 100 * $div) / $div;
        return [
            'id' => rand(1,20),
            'name' => $this->faker->name(),
            'lat' => $lat,
            'lon' => $lon,
        ];
    }
}
