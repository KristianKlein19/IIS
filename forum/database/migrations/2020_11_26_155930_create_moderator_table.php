<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModeratorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moderator', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_users')->index('id_users'); // foreign key
            $table->unsignedBigInteger('id_skupina')->index('id_skupina'); // foreign key
            $table->timestamps();
            $table->unique(['id_users', 'id_skupina']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moderator');
    }
}
