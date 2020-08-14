<?php

use Illuminate\Database\Seeder;
use App\Rol;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('roles')->insert([
          'nombre'=> 'Empleado',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('roles')->insert([
          'nombre'=> 'Facultad',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('roles')->insert([
          'nombre'=> 'ServiciosSalud',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('roles')->insert([
          'nombre'=> 'ServiciosCampus',
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('roles')->insert([
          'nombre'=> 'Superadmin',
          'created_at' => now(),
          'updated_at' => now()
      ]);
    }
}
