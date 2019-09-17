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
            $table->string('lugar_expedicion')->nullable();
            $table->string('metodo_pago')->nullable();
            $table->string('tipo_comprobante')->nullable();
            $table->string('total')->nullable();
            $table->string('moneda')->nullable();
            $table->string('certificado')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('numero_de_certificado')->nullable();
            $table->string('forma_pago')->nullable();
            $table->string('sello')->nullable();
            $table->string('fecha')->nullable();
            $table->string('folio')->nullable();
            $table->string('serie')->nullable();
            $table->string('version')->nullable();
            $table->string('uuid')->nullable();
            $table->string('fecha_timbrado')->nullable();
            $table->string('contrarecibo')->nullable();
            $table->string('revicion')->nullable();
            $table->string('importe_pagado')->nullable();
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
