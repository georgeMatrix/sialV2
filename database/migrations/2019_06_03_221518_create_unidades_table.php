<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('provedor');
            $table->foreign('provedor')->references('id')->on('provedores');
            $table->string('nombre');
            $table->string('economico');
            $table->string('tipo');
            $table->string('marca');
            $table->string('modelo');
            $table->string('placas');
            $table->string('serie');
            $table->string('motor');
            $table->date('seguro');
            $table->date('verificacion');
            $table->date('fm');
            $table->string('obs')->nullable();
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
        Schema::dropIfExists('unidades');
    }
}
