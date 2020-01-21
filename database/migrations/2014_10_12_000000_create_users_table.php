<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            //$table->string('email')->unique();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('apellidoPaterno')->nullable();
            $table->string('apellidoMaterno')->nullable();
            $table->string('nombre')->nullable();
            $table->string('nombreCorto')->nullable();
            $table->string('cargo')->nullable();
            $table->string('area')->nullable();
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
        Schema::dropIfExists('users');
    }
}
