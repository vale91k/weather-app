<?php

use App\Models\Forecast;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForecastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forecasts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->contained()->onDelete('cascade');
            $table->date('date');
            $table->decimal('temp', 5, 2);
            $table->integer('clouds');
        });
        Forecast::insertDataFromApi();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forecasts');
    }
}
