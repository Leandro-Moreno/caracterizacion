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
            $table->bigIncrements('id');
            $table->biginteger('rol_id')->unsigned()->default(1); //TODO: eliminar el rol_id... se debe mantener la relacion de roles_users
            $table->foreign('rol_id')->references('id')->on('roles');
            $table->biginteger('estado_id')->unsigned()->default(1);
            $table->foreign('estado_id')->references('id')->onUpdate('cascade')->on('estados');
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default('0');
            $table->string('tipo_doc')->nullable();
            $table->biginteger('documento')->nullable();
            $table->string('cargo')->nullable();
            $table->string('tipo_contrato')->nullable();
            $table->string('celular')->nullable();
            $table->string('direccion')->nullable();
            $table->biginteger('unidad_id')->unsigned();
            $table->foreign('unidad_id')->references('id')->on('unidades');
            $table->string('barrio')->nullable();
            $table->string('localidad')->nullable();
            $table->rememberToken();
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
