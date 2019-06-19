<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provedores', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nombre');
            $table->string('razon_social');
            $table->string('rfc');
            $table->string('direccion');
            $table->string('contacto');
            $table->string('mail');
            $table->integer('credito');
            $table->double('saldo')->nullable();
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
        Schema::dropIfExists('provedor');
    }
}
