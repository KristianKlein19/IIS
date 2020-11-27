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
            $table->foreign('id_users', 'clen_ibfk_1')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_skupina', 'clen_ibfk_2')->references('id')->on('skupina')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
