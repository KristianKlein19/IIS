<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZadostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zadost', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('typ');
            $table->string('text', 2000)->nullable();
            $table->unsignedTinyInteger('stav');
            $table->string('od', 32)->index('od');
            $table->string('do')->index('do');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zadost');
    }
}
