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
            'user_id' => '1',
            'indispensable_presencial'=> 'Si',
            'por_que'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'horaEntrada'=> '8:00',
            'horaSalida'=> '12:00',
            'dias_laborales'=> '6',
            'trabajo_en_casa'=> 'No',
            'viabilidad_caracterizacion'=> 'Consultar con jefatura servicio médico y SST',
            'revision1'=> ' Servicio Médico y Seguridad y Salud en el trabajo',
            'revision2'=> 'Lorem ipsum dolor sit amet, consectetur',
            'observacion_cambios_de_estado'=> 'Lorem ipsum dolor sit amet',
            'notas_comentarios_ma_andrea_leyva'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'envio_de_consentimiento'=> 'Si'
        ]);

        DB::table('caracterizacion')->insert([
            'user_id' => '2',
            'indispensable_presencial'=> 'si',
            'por_que'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'horaEntrada'=> '12:00',
            'horaSalida'=> '4:00',
            'dias_laborales'=> '6',
            'trabajo_en_casa'=> 'No',
            'viabilidad_caracterizacion'=> 'Viable trabajo presencial',
            'revision1'=> ' Servicio Médico y Seguridad y Salud en el trabajo',
            'revision2'=> 'Lorem ipsum dolor sit amet, consectetur',
            'observacion_cambios_de_estado'=> 'Lorem ipsum dolor sit amet',
            'notas_comentarios_ma_andrea_leyva'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'envio_de_consentimiento'=> 'Si'
        ]);


        DB::table('caracterizacion')->insert([
            'user_id' => '3',
            'indispensable_presencial'=> 'si',
            'por_que'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'horaEntrada'=> '12:00',
            'horaSalida'=> '4:00',
            'dias_laborales'=> '6',
            'trabajo_en_casa'=> 'No',
            'viabilidad_caracterizacion'=> 'Trabajo en casa y consultar a ',
            'revision1'=> ' Servicio Médico y Seguridad y Salud en el trabajo',
            'revision2'=> 'Lorem ipsum dolor sit amet, consectetur',
            'observacion_cambios_de_estado'=> 'Lorem ipsum dolor sit amet',
            'notas_comentarios_ma_andrea_leyva'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'envio_de_consentimiento'=> 'Si'
       ]);

       DB::table('caracterizacion')->insert([
            'user_id' => '4',
            'indispensable_presencial'=> 'si',
            'por_que'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'horaEntrada'=> '8:00',
            'horaSalida'=> '12:00',
            'dias_laborales'=> '6',
            'trabajo_en_casa'=> 'No',
            'viabilidad_caracterizacion'=> 'Viable trabajo presencial',
            'revision1'=> ' Servicio Médico y Seguridad y Salud en el trabajo',
            'revision2'=> 'Lorem ipsum dolor sit amet, consectetur',
            'observacion_cambios_de_estado'=> 'Lorem ipsum dolor sit amet',
            'notas_comentarios_ma_andrea_leyva'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'envio_de_consentimiento'=> 'Si'
        ]);
    }
}
