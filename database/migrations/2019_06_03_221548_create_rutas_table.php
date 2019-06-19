<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRutasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutas', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('clientes');
            $table->foreign('clientes')->references('id')->on('clientes');
            $table->string('nombre');
            $table->string('lugar_exp');
            $table->string('origen');
            $table->string('remitente');
            $table->string('dom_remitente');
            $table->string('recoge');
            $table->string('valor_declarado');
            $table->string('destino');
            $table->string('destinatario');
            $table->string('dom_destinatario');
            $table->string('entrega');
            $table->string('fecha_entrega');
            $table->string('cantidad');
            $table->string('embalaje');
            $table->string('concepto');
            $table->string('material_peligroso');
            $table->string('indemnizacion');
            $table->double('importe');
            $table->unsignedInteger('asignacion_precio');
            $table->foreign('asignacion_precio')->references('id')->on('provedores');
            $table->string('obs');
            $table->integer('dias_re');
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
        Schema::dropIfExists('rutas');
    }
}
