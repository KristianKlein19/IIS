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
            $table->id();
            $table->unsignedBigInteger('id_users')->index('id_users'); // foreign key
            $table->unsignedBigInteger('id_prispevek')->index('id_prispevek'); // foreign key
            $table->tinyInteger('hodnotil');
            $table->timestamps();
            $table->unique(['id_users', 'id_prispevek']);
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
