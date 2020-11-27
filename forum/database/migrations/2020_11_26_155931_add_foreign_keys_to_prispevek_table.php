<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPrispevekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prispevek', function (Blueprint $table) {
            $table->foreign('soucast', 'prispevek_ibfk_1')->references('id')->on('vlakno')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('odpoved', 'prispevek_ibfk_2')->references('id')->on('prispevek')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('prispevatel', 'prispevek_ibfk_3')->references('nick')->on('uzivatel')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prispevek', function (Blueprint $table) {
            $table->dropForeign('prispevek_ibfk_1');
            $table->dropForeign('prispevek_ibfk_2');
            $table->dropForeign('prispevek_ibfk_3');
        });
    }
}
