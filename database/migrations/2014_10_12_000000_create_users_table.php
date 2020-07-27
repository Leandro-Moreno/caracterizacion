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
            $table->biginteger('rol_id')->unsigned();
            $table->foreign('rol_id')->references('id')->on('roles');
            $table->string('name')->nullable();
            $table->string('name2')->nullable();
            $table->string('apellido')->nullable();
            $table->string('apellido2')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('tipo_doc')->nullable();
            $table->integer('documento')->nullable();
            $table->string('profesion')->nullable();
            $table->string('cargo')->nullable();
            $table->string('celular')->nullable();
            $table->string('direccion')->nullable();
            $table->string('medio')->nullable();
            $table->string('tipo_persona')->nullable();
            $table->string('uso_datos')->nullable();          
            $table->string('asistencia_minima')->nullable();
            $table->rememberToken();
            $table->timestamps();
            /*
            Consecutivo de Certificado
            Fecha entrega de certificación
            Valor de pago
            */
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
