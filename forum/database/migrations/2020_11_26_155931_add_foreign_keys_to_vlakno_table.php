<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToVlaknoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vlakno', function (Blueprint $table) {
            $table->foreign('soucast', 'vlakno_ibfk_1')->references('id')->on('skupina')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('zakladatel', 'vlakno_ibfk_2')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vlakno', function (Blueprint $table) {
            $table->dropForeign('vlakno_ibfk_1');
            $table->dropForeign('vlakno_ibfk_2');
        });
    }
}
