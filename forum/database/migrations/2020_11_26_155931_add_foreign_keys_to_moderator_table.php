<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToModeratorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('moderator', function (Blueprint $table) {
            $table->foreign('id_users', 'moderator_ibfk_1')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('id_skupina', 'moderator_ibfk_2')->references('id')->on('skupina')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('moderator', function (Blueprint $table) {
            $table->dropForeign('moderator_ibfk_1');
            $table->dropForeign('moderator_ibfk_2');
        });
    }
}
