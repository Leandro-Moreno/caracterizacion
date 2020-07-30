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
            'por_responsabilidades_es_indispensable_su_trabajo_presencial'=> 'Si',
            'por_que'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'horaEntrada'=> '8:00',
            'horaSalida'=> '12:00',
            'dias_laborales'=> 'Sabado',
            'trabajo_en_casa'=> 'No',
            'viabilidad_por_caracterizacion'=> 'Consultar con jefatura servicio médico y SST',
            'revision1'=> ' Servicio Médico y Seguridad y Salud en el trabajo',
            'revision2'=> 'Revisión ',
            'observacion_cambios_de_estado'=> '',
            'notas_comentarios_ma_andrea_leyva'=> '',
            'envio_de_consentimiento'=> '',
            'user_id' => '3' 
        ]);

        DB::table('caracterizacion')->insert([
            'por_responsabilidades_es_indispensable_su_trabajo_presencial'=> 'si',
            'por_que'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'horaEntrada'=> '12:00',
            'horaSalida'=> '4:00',
            'dias_laborales'=> 'Sabado',
            'trabajo_en_casa'=> 'No',
            'viabilidad_por_caracterizacion'=> 'Viable trabajo presencial',
            'revision1'=> ' Servicio Médico y Seguridad y Salud en el trabajo',
            'revision2'=> 'Revisión ',
            'observacion_cambios_de_estado'=> '',
            'notas_comentarios_ma_andrea_leyva'=> '',
            'envio_de_consentimiento'=> '',
            'user_id' => '4'
        ]);


        DB::table('caracterizacion')->insert([
            'por_responsabilidades_es_indispensable_su_trabajo_presencial'=> 'si',
            'por_que'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'horaEntrada'=> '12:00',
            'horaSalida'=> '4:00',
            'dias_laborales'=> 'Sabado',
            'trabajo_en_casa'=> 'No',
            'viabilidad_por_caracterizacion'=> 'Trabajo en casa y consultar a ',
            'revision1'=> ' Servicio Médico y Seguridad y Salud en el trabajo',
            'revision2'=> 'Revisión ',
            'observacion_cambios_de_estado'=> '',
            'notas_comentarios_ma_andrea_leyva'=> '',
            'envio_de_consentimiento'=> '',
            'user_id' => '5'  
       ]);

       DB::table('caracterizacion')->insert([
            'por_responsabilidades_es_indispensable_su_trabajo_presencial'=> 'si',
            'por_que'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'horaEntrada'=> '8:00',
            'horaSalida'=> '12:00',
            'dias_laborales'=> 'Sabado',
            'trabajo_en_casa'=> 'No',
            'viabilidad_por_caracterizacion'=> 'Viable trabajo presencial',
            'revision1'=> ' Servicio Médico y Seguridad y Salud en el trabajo',
            'revision2'=> 'Revisión ',
            'observacion_cambios_de_estado'=> '',
            'notas_comentarios_ma_andrea_leyva'=> '',
            'envio_de_consentimiento'=> '',
            'user_id' => '6'  
        ]);
    }
}
