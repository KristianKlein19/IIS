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
            $table->id();
            $table->unsignedTinyInteger('typ');
            $table->string('text', 200)->nullable();
            $table->unsignedTinyInteger('stav');
            $table->unsignedBigInteger('od')->index('od'); // foreign key
            $table->unsignedBigInteger('do')->index('do'); // foreign key
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
        Schema::dropIfExists('zadost');
    }
}
