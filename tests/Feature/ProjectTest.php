<?php

namespace Tests\Feature;

use App\Models\City;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    private $city;

    /**
     * Define the model's default state.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->city = City::factory()->make();
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

}
