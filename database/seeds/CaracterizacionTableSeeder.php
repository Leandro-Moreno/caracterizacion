<?php

use Illuminate\Database\Seeder;
use App\Model\Caracterizacion\Caracterizacion;


class CaracterizacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('caracterizacion')->insert([
            'pregunta1'=> 'si',
            'pregunta2'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'horaEntrada'=> '8:00',
            'horaSalida'=> '12:00',
            'pregunta3'=> 'Sabado',
            'pregunta4'=> 'No',
            'viabilidad'=> 'Consultar con jefatura servicio médico y SST',
            'revision1'=> ' Servicio Médico y Seguridad y Salud en el trabajo',
            'revision2'=> 'Revisión ',
            'observacion'=> '',
            'notas'=> '',
            'envio'=> '',
            'user_id' => '3' 
        ]);

        DB::table('caracterizacion')->insert([
            'pregunta1'=> 'si',
            'pregunta2'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'horaEntrada'=> '12:00',
            'horaSalida'=> '4:00',
            'pregunta3'=> 'Sabado',
            'pregunta4'=> 'No',
            'viabilidad'=> 'Viable trabajo presencial',
            'revision1'=> ' Servicio Médico y Seguridad y Salud en el trabajo',
            'revision2'=> 'Revisión ',
            'observacion'=> '',
            'notas'=> '',
            'envio'=> '',
            'user_id' => '4'
        ]);


        DB::table('caracterizacion')->insert([
            'pregunta1'=> 'si',
            'pregunta2'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'horaEntrada'=> '12:00',
            'horaSalida'=> '4:00',
            'pregunta3'=> 'Sabado',
            'pregunta4'=> 'No',
            'viabilidad'=> 'Trabajo en casa y consultar a ',
            'revision1'=> ' Servicio Médico y Seguridad y Salud en el trabajo',
            'revision2'=> 'Revisión ',
            'observacion'=> '',
            'notas'=> '',
            'envio'=> '',
            'user_id' => '5'  
       ]);

       DB::table('caracterizacion')->insert([
            'pregunta1'=> 'si',
            'pregunta2'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'horaEntrada'=> '8:00',
            'horaSalida'=> '12:00',
            'pregunta3'=> 'Sabado',
            'pregunta4'=> 'No',
            'viabilidad'=> 'Viable trabajo presencial',
            'revision1'=> ' Servicio Médico y Seguridad y Salud en el trabajo',
            'revision2'=> 'Revisión ',
            'observacion'=> '',
            'notas'=> '',
            'envio'=> '',
            'user_id' => '6'  
        ]);
    }
}
