<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUzivatelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uzivatel', function (Blueprint $table) {
            $table->string('nick', 32)->primary();
            $table->string('email', 320)->unique('email');
            $table->binary('heslo');
            $table->string('bio', 5000)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uzivatel');
    }
}
