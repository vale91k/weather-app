<?php

namespace Tests\Feature;

use App\Models\City;
use App\Models\Forecast;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    private $city;
    private $forecasts;

    /**
     * Define the model's default state.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->city = City::factory()->make();
        $this->forecasts = Forecast::factory()->make();
    }

    public function test_getOkMain()
    {
        $response = $this->get('/');
        $response->assertOk();
    }

    public function test_seeNameOfCityOnMain()
    {
        $data['city'] = $this->city;
        $view = $this->view('home', $data);
        $view->assertSee($this->city->name);
    }

    public function test_seeForecastResultsOnMain()
    {
        $data['weatherData'] = [$this->forecasts];
        $view = $this->view('home', $data);
        $view->assertSee($this->forecasts->temp);
        $view->assertSee($this->forecasts->clouds);
    }
}
