<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaracterizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracterizacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pregunta1');
            $table->string('pregunta2');
            $table->dateTime('horaEntrada');
            $table->dateTime('horaSalida');
            $table->string('pregunta3');
            $table->string('pregunta4');
            $table->string('viabilidad');
            $table->string('revision1');
            $table->string('revision2');
            $table->string('observacion');
            $table->string('notas');
            $table->string('envio');
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
        Schema::dropIfExists('caracterizacion');
    }
}
