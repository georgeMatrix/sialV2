<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('apellidoPaterno');
            $table->string('apellidoMaterno');
            $table->string('nombre');
            $table->string('password');
            $table->string('nombreCorto');
            $table->string('cargo');
            $table->string('area');
            $table->boolean('modulo01')->default(0);
            $table->boolean('modulo02')->default(0);
            $table->boolean('modulo03')->default(0);
            $table->boolean('modulo04')->default(0);
            $table->boolean('modulo05')->default(0);
            $table->boolean('modulo06')->default(0);
            $table->boolean('modulo07')->default(0);
            $table->boolean('modulo08')->default(0);
            $table->boolean('modulo09')->default(0);
            $table->boolean('modulo10')->default(0);
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
        Schema::dropIfExists('usuarios');
    }
}
