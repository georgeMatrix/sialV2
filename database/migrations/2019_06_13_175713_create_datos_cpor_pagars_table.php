<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosCporPagarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_cpor_pagars', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('ruta');
            $table->foreign('ruta')->references('id')->on('rutas');
            $table->string('concepto');
            $table->unsignedInteger('asignacionPrecio');
            $table->foreign('asignacionPrecio')->references('id')->on('provedores');
            $table->string('claveProdServ');
            $table->string('noIdentificacion');
            $table->integer('cantidad');
            $table->string('claveUnidad');
            $table->string('unidad');
            $table->string('descripcion');
            $table->integer('valorUnitario');
            $table->integer('importe');
            $table->integer('tivaCxP');
            $table->integer('tisrCxP');
            $table->integer('rivaCxP');
            $table->integer('risrCxP');
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
        Schema::dropIfExists('datos_cpor_pagars');
    }
}
