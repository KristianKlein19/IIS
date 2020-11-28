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
            $table->id();
            $table->string('nazev');
            $table->string('popis', 10000)->nullable();
            $table->tinyInteger('zabezpeceni_profilu');
            $table->tinyInteger('zabezpeceni_obsahu');
            $table->unsignedBigInteger('spravce')->index('spravce'); // foreign key
            $table->timestamps();
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
