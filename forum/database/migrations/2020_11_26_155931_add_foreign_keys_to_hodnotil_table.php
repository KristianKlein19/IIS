<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToHodnotilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hodnotil', function (Blueprint $table) {
            $table->foreign('id_users', 'hodnotil_ibfk_1')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_prispevek', 'hodnotil_ibfk_2')->references('id')->on('prispevek')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hodnotil', function (Blueprint $table) {
            $table->dropForeign('hodnotil_ibfk_1');
            $table->dropForeign('hodnotil_ibfk_2');
        });
    }
}
