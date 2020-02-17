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
            $table->string('certificado', 3000)->nullable();
            $table->string('subtotal')->nullable();
            $table->string('numero_de_certificado')->nullable();
            $table->string('forma_pago')->nullable();
            $table->string('sello', 400)->nullable();
            $table->string('fecha')->nullable();
            $table->string('folio')->nullable();
            $table->string('serie')->nullable();
            $table->string('version')->nullable();
            $table->string('uuid')->nullable();
            $table->string('fecha_timbrado')->nullable();
            $table->string('contrarecibo')->nullable();
            $table->string('revicion')->nullable();
            $table->string('importe_pagado')->nullable();
            $table->string('uso_cfdi')->nullable();
            $table->string('peso')->nullable();
            $table->string('referencia')->nullable();
            $table->string('impuestos_trasladados')->nullable();
            $table->string('impuestos_retenidos')->nullable();
            $table->string('selloCFD', 400)->nullable();
            $table->string('condicionesPago')->nullable();
            $table->string('tipoCambio')->nullable();
            $table->string('emisor_razon_social')->nullable();
            $table->string('receptor_razon_social')->nullable();
            $table->string('status')->default('GENERADO');
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
