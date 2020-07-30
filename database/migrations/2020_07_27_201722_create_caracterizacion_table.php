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
            $table->time('horaEntrada');
            $table->time('horaSalida');
            $table->string('pregunta3');
            $table->string('pregunta4');
            $table->string('viabilidad')->nullable();;
            $table->string('revision1')->nullable();;
            $table->string('revision2')->nullable();;
            $table->string('observacion')->nullable();;
            $table->string('notas')->nullable();;
            $table->string('envio')->nullable();;
            $table->biginteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

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
