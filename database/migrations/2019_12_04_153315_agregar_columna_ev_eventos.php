<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregarColumnaEvEventos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ev_eventos', function (Blueprint $table) {
          $table->biginteger('firma2_id')->unsigned()->default(1);


          $table->foreign('firma2_id')->references('id')->on('ev_firmas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ev_eventos', function (Blueprint $table) {
            //
        });
    }
}
