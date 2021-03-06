<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('name');
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('lon', 10, 7)->nullable();
        });

        DB::table('cities')->insert(
            [
                'name' => 'Moscow',
                'lat' => 55.751244,
                'lon' => 37.618423
            ]
        );
        DB::table('cities')->insert(
            [
                'name' => 'Magnitogorsk',
                'lat' => 53.41861,
                'lon' => 59.04722
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
