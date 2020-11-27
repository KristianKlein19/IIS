<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToZadostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('zadost', function (Blueprint $table) {
            $table->foreign('od', 'zadost_ibfk_1')->references('nick')->on('uzivatel')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('do', 'zadost_ibfk_2')->references('nazev')->on('skupina')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('zadost', function (Blueprint $table) {
            $table->dropForeign('zadost_ibfk_1');
            $table->dropForeign('zadost_ibfk_2');
        });
    }
}
