<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSkupinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skupina', function (Blueprint $table) {
            $table->foreign('spravce', 'skupina_ibfk_1')->references('nick')->on('uzivatel')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skupina', function (Blueprint $table) {
            $table->dropForeign('skupina_ibfk_1');
        });
    }
}
