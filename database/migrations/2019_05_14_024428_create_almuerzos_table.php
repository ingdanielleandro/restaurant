<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlmuerzosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almuerzos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('corrientes_id')->nullable();
            $table->foreign('corrientes_id')->references('id')->on('corrientes');
            $table->unsignedBigInteger('ejecutivos_id')->nullable();
            $table->foreign('ejecutivos_id')->references('id')->on('ejecutivos');
            $table->unsignedBigInteger('adicionales_id')->nullable();
            $table->foreign('adicionales_id')->references('id')->on('adicionales');
            $table->unsignedBigInteger('sopas_id')->nullable();
            $table->foreign('sopas_id')->references('id')->on('sopas');
            $table->boolean('arroz');
            $table->boolean('ensalada');
            $table->string('precio');
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
        Schema::dropIfExists('almuerzos');
    }
}
