<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosFacturacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_facturacions', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('rutas');
            $table->integer('facturador');
            $table->unsignedInteger('clientes');
            $table->foreign('clientes')->references('id')->on('clientes');
            $table->foreign('rutas')->references('id')->on('rutas');
            $table->unsignedInteger('asignacionPrecio');
            $table->foreign('asignacionPrecio')->references('id')->on('provedores');
            $table->string('claveProdServ');
            $table->string('noIdentificacion');
            $table->double('cantidad');
            $table->string('claveUnidad');
            $table->string('unidad');
            $table->string('descripcion');
            $table->string('valorUnitario');
            $table->double('importe');
            $table->double('tIva');
            $table->double('tIsr');
            $table->double('rIva');
            $table->double('rIsr');
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
        Schema::dropIfExists('datos_facturacions');
    }
}
