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
            $table->id();
            $table->string('nazev');
            $table->string('popis', 10000)->nullable();
            $table->tinyInteger('stav');
            $table->tinyInteger('pripnute_vlakno');
            $table->unsignedBigInteger('soucast')->index('soucast'); // foreign key
            $table->unsignedBigInteger('zakladatel')->nullable()->index('zakladatel'); // foreign key
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
        Schema::dropIfExists('vlakno');
    }
}
