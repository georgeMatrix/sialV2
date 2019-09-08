<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('lugar_expedicion');
            $table->string('metodo_pago');
            $table->string('tipo_comprobante');
            $table->string('total');
            $table->string('moneda');
            $table->string('certificado');
            $table->string('subtotal');
            $table->string('numero_de_certificado');
            $table->string('forma_pago');
            $table->string('sello');
            $table->string('fecha');
            $table->string('folio');
            $table->string('serie');
            $table->string('version');
            $table->string('uuid');
            $table->string('fecha_timbrado');
            $table->string('contrarecibo');
            $table->string('revicion');
            $table->string('importe_pagado');
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
        Schema::dropIfExists('facturas');
    }
}
