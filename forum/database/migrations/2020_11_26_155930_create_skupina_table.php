<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkupinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skupina', function (Blueprint $table) {
            $table->string('nazev')->primary();
            $table->string('popis', 10000)->nullable();
            $table->binary('ikona')->nullable();
            $table->tinyInteger('zabezpeceni_profilu');
            $table->tinyInteger('zabezpeceni_obsahu');
            $table->string('spravce', 32)->index('spravce');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skupina');
    }
}
