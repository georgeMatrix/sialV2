<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nombre');
            $table->string('razonSocial');
            $table->string('rfc');
            $table->string('regimen');
            $table->string('calle');
            $table->string('numero');
            $table->string('interior');
            $table->string('colonia');
            $table->string('ciudad');
            $table->string('cp');
            $table->string('estado');
            $table->string('contacto1');
            $table->string('tel1');
            $table->string('mail1');
            $table->string('contacto2');
            $table->string('tel2');
            $table->string('mail2');
            $table->string('dia_revision');
            $table->integer('dia_credito');
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
        Schema::dropIfExists('clientes');
    }
}
