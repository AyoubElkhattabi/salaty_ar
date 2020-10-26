<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {

            $table->id();
            $table->string('name')->nullable(false);
            $table->string('logo')->nullable();
            $table->boolean('logostatus')->default(0);
            $table->string('favicon')->nullable(false);
            $table->string('title',60)->nullable(false);
            $table->string('description',160)->nullable(false);
            $table->string('keywords')->nullable(false);
            $table->string('poweredby')->nullable(false);
            $table->timestamps();

        });

/*        DB::table('infos')->insert(
            [
                'name'=>'ادخل اسم موقعك ',
                'logo'=>'ادخل رابط الصورة',
                'favicon'=>'favicon ادخل رابط صورة',
                'title'=>'ادخل عنوان موقعك ',
                'description'=>'ادخل الكلمات الوصفية الخاصة بموقعك',
                'keywords'=>'ادخل الكلمات الدلالية لموقعك',
                'poweredby'=>'ادخل اسم البرنامج و اصداره',

            ]
        );
*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infos');
    }
}
