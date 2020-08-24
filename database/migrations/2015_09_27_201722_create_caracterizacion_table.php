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
            $table->biginteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('dependencia')->nullable();
            $table->string('indispensable_presencial');
            $table->string('por_que')->nullable();
            $table->time('horaEntrada')->nullable();
            $table->time('horaSalida')->nullable();
            $table->text('dias_laborales');
            $table->string('trabajo_en_casa')->nullable();
            $table->string('viabilidad_caracterizacion')->nullable();
            $table->string('observacion_cambios_de_estado')->nullable();
            $table->string('notas_comentarios_ma_andrea_leyva')->nullable();
            $table->string('envio_de_consentimiento')->nullable();
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
