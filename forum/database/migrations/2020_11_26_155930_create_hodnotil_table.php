<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHodnotilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hodnotil', function (Blueprint $table) {
            $table->string('nick', 32);
            $table->unsignedInteger('id')->index('id');
            $table->tinyInteger('hodnotil');
            $table->primary(['nick', 'id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hodnotil');
    }
}
