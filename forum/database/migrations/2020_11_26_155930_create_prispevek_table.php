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
            $table->id();
            $table->integer('karma');
            $table->string('text', 10000);
            $table->unsignedBigInteger('soucast')->index('soucast'); // foreign key
            $table->unsignedBigInteger('odpoved')->nullable()->index('odpoved'); // foreign key
            $table->unsignedBigInteger('prispevatel')->index('prispevatel'); // foreign key
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
        Schema::dropIfExists('prispevek');
    }
}
