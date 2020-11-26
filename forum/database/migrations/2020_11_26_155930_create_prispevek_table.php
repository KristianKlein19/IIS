<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrispevekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prispevek', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('karma');
            $table->string('text', 10000);
            $table->unsignedInteger('soucast')->index('soucast');
            $table->unsignedInteger('odpoved')->nullable()->index('odpoved');
            $table->string('prispevatel', 32)->index('prispevatel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prispevek');
    }
}
