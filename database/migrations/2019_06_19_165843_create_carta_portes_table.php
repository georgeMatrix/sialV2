<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartaPortesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carta_portes', function (Blueprint $table) {
            $table->Increments('id');
            $table->char('tipo');
            //$table->integer('id_tipo');
            $table->dateTime('fecha');

            $table->unsignedInteger('rutas');
            $table->foreign('rutas')->references('id')->on('rutas');
            $table->unsignedInteger('unidades');
            $table->foreign('unidades')->references('id')->on('unidades');
            $table->unsignedInteger('remolques');
            $table->foreign('remolques')->references('id')->on('unidades');
            $table->unsignedInteger('operadores');
            $table->foreign('operadores')->references('id')->on('operadores');
            $table->string('referencia');
            $table->string('status')->default('abierta');;
            $table->dateTime('fechaDeEmbarque');
            $table->dateTime('fechaDeEntrega');
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
        Schema::dropIfExists('carta_portes');
    }
}
