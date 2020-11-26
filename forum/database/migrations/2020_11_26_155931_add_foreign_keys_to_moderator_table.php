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
            $table->foreign('nick', 'moderator_ibfk_1')->references('nick')->on('uzivatel')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('nazev', 'moderator_ibfk_2')->references('nazev')->on('skupina')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
