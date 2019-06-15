<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorrientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corrientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('proteinas_id')->nullable();
            $table->foreign('proteinas_id')->references('id')->on('proteinas');
            $table->unsignedBigInteger('principios_id')->nullable();
            $table->foreign('principios_id')->references('id')->on('principios');
            $table->boolean('disponible')->default(false);
            $table->boolean('estado')->default(false);
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
        Schema::dropIfExists('corrientes');
    }
}
