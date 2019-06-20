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
            $table->date('fecha');

            $table->unsignedInteger('rutas');
            $table->foreign('rutas')->references('id')->on('rutas');
            $table->unsignedInteger('unidades');
            $table->foreign('unidades')->references('id')->on('unidades');
            $table->unsignedInteger('remolques');
            $table->foreign('remolques')->references('id')->on('unidades');
            $table->unsignedInteger('operadores');
            $table->foreign('operadores')->references('id')->on('operadores');

            $table->string('referencia');
            $table->dateTime('fechaDeEmbarque');
            $table->dateTime('fechaDeEntrega');

            $table->unsignedInteger('ultimoStatus')->nullable();
            $table->foreign('ultimoStatus')->references('id')->on('actividads');
            $table->unsignedInteger('fechaStatus')->nullable();
            $table->foreign('fechaStatus')->references('id')->on('actividads');

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
