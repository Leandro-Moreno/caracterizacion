<?php

use Illuminate\Database\Seeder;
use App\Model\Caracterizacion\Unidad;

class UnidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('unidades')->insert([
          'nombre_unidad'=> 'AUDITORÍA INTERNA',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'CENTRO DE ÉTICA',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'CIDER',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'CONECTA-TE',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'DECANATURA DE ESTUDIANTES',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'DIR GESTIÓN HUMANA Y ORGANIZACIONAL',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'DIRECCIÓN CAMPUS SOSTENIBLE',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'DIRECCIÓN DE ADMISIONES Y REGISTRO',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'DIRECCIÓN DE EDUCACIÓN CONTINUA',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'DIRECCIÓN DE PLANEACIÓN Y EVALUACIÓN',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'DIRECCIÓN DE SERVICIOS DE INFORMACIÓN Y TECNOLOGÍA',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'DIRECCIÓN FINANCIERA',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'DIRECCIÓN SERVICIOS ADMINISTRATIVOS',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'DIRECCIÓN SERVICIOS CAMPUS',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'ESCUELA DE GOBIERNO',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'FACULTAD DE ADMINISTRACIÓN',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'FACULTAD DE ARQUITECTURA Y DISEÑO',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'FACULTAD DE ARTES Y HUMANIDADES',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'FACULTAD DE CIENCIAS',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'FACULTAD DE CIENCIAS SOCIALES',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'FACULTAD DE DERECHO',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'FACULTAD DE ECONOMÍA',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'FACULTAD DE EDUCACIÓN',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'FACULTAD DE INGENIERÍA',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'FACULTAD DE MEDICINA',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'RECTORÍA',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'SECRETARÍA GENERAL',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'SISTEMA DE BIBLIOTECAS',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'VICERRECTORÍA ACADÉMICA',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'VICERRECTORÍA DE DESARROLLO Y EGRESADOS',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'VICERRECTORÍA INVESTIGACIÓN Y CREACIÓN',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('unidades')->insert([
          'nombre_unidad'=> 'VICERRECTORÍA SERVICIOS Y SOSTENIBILIDAD',
          'created_at' => now(),
          'updated_at' => now()
      ]);

    }
}
