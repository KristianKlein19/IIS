<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clen', function (Blueprint $table) {
            $table->foreign('nick', 'clen_ibfk_1')->references('nick')->on('uzivatel')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('nazev', 'clen_ibfk_2')->references('nazev')->on('skupina')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clen', function (Blueprint $table) {
            $table->dropForeign('clen_ibfk_1');
            $table->dropForeign('clen_ibfk_2');
        });
    }
}
