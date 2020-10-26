<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {

            $table->id();
            $table->string('name_ar')->unique()->nullable(false);
            $table->string('name_en')->unique()->nullable(false);
            $table->string('title',60)->nullable(false);
            $table->string('description',160)->nullable(false);
            $table->string('keywords')->nullable(false);
            $table->string('flag')->nullable(false);
            $table->string('slug')->unique()->nullable(false);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
