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
            'dependencia' => 'Uniandes',
            'por_que'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'horaEntrada'=> '8:00',
            'horaSalida'=> '12:00',
            'dias_laborales'=> '6',
            'trabajo_en_casa'=> 'No',
            'viabilidad_caracterizacion'=> 'Consultar con jefatura servicio médico y SST',
            'observacion_cambios_de_estado'=> 'Lorem ipsum dolor sit amet',
            'notas_comentarios_ma_andrea_leyva'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'envio_de_consentimiento'=> 'Si',
            'user_id' => '3' 
        ]);

        DB::table('caracterizacion')->insert([
            'user_id' => '2',
            'indispensable_presencial'=> 'Si',
            'dependencia' => 'Uniandes',
            'por_que'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'horaEntrada'=> '12:00',
            'horaSalida'=> '4:00',
            'dias_laborales'=> '6',
            'trabajo_en_casa'=> 'No',
            'viabilidad_caracterizacion'=> 'Viable trabajo presencial',
            'observacion_cambios_de_estado'=> 'Lorem ipsum dolor sit amet',
            'notas_comentarios_ma_andrea_leyva'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'envio_de_consentimiento'=> 'Si',
            'user_id' => '4'
        ]);


        DB::table('caracterizacion')->insert([
            'user_id' => '3',
            'indispensable_presencial'=> 'Si',
            'dependencia' => 'Uniandes',
            'por_que'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'horaEntrada'=> '12:00',
            'horaSalida'=> '4:00',
            'dias_laborales'=> '6',
            'trabajo_en_casa'=> 'No',
            'viabilidad_caracterizacion'=> 'Trabajo en casa y consultar a telemedicina',
            'observacion_cambios_de_estado'=> 'Lorem ipsum dolor sit amet',
            'notas_comentarios_ma_andrea_leyva'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'envio_de_consentimiento'=> 'No',
            'user_id' => '5'  
       ]);

       DB::table('caracterizacion')->insert([
            'user_id' => '4',
            'indispensable_presencial'=> 'Si',
            'dependencia' => 'Uniandes',
            'por_que'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'horaEntrada'=> '8:00',
            'horaSalida'=> '12:00',
            'dias_laborales'=> '6',
            'trabajo_en_casa'=> 'No',
            'viabilidad_caracterizacion'=> 'Viable trabajo presencial',
            'observacion_cambios_de_estado'=> 'Lorem ipsum dolor sit amet',
            'notas_comentarios_ma_andrea_leyva'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt',
            'envio_de_consentimiento'=> 'No',
            'user_id' => '6'  
        ]);
    }
}
