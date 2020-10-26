<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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

            $table->id();
            //$table->unsignedBigInteger('id');
            $table->string('name')->nullable(false);
            $table->string('title',60)->nullable(false);
            $table->string('description',160)->nullable(false);
            $table->string('nickname')->nullable();
            $table->string('state')->nullable();
            $table->enum('timezone',[
                                     'GMT -12','GMT -11','GMT -10','GMT -9',
                                     'GMT -8' ,'GMT -7' ,'GMT -6' ,'GMT -5',
                                     'GMT -4' ,'GMT -3' ,'GMT -2' ,'GMT -1',
                                     'GMT 0',
                                     'GMT 1'  ,'GMT 2'  ,'GMT 3'  ,'GMT 4' ,
                                     'GMT 5'  ,'GMT 6'  ,'GMT 7'  ,'GMT 8' ,
                                     'GMT 9'  ,'GMT 10' ,'GMT 11' ,'GMT 12'
                                     ])->nullable(false);
            $table->string('space')->nullable();
            $table->string('coordinates')->nullable();
            $table->string('population')->nullable();
            $table->unsignedBigInteger('countryid')->nullable(false);
            $table->foreign('countryid')->references('id')->on('countries');
            $table->string('slug')->unique()->nullable(false);
            $table->timestamps();
           // $table->primary('name','countryid');

        });
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
