<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVlaknoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vlakno', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nazev');
            $table->string('popis', 10000)->nullable();
            $table->tinyInteger('stav');
            $table->string('soucast')->index('soucast');
            $table->tinyInteger('pripnute_vlakno');
            $table->string('zakladatel', 32)->index('zakladatel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vlakno');
    }
}
