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
      $user = new Rol();
      $user->nombre="super admin";
      $user->save();

      $user = new Rol();
      $user->nombre="servicios campus";
      $user->save();

      $user = new Rol();
      $user->nombre="servicios salud";
      $user->save();
      
      $user = new Rol();
      $user->nombre="facultad";
      $user->save();

      $user = new Rol();
      $user->nombre="director";
      $user->save();

      $user = new Rol();
      $user->nombre="empleado";
      $user->save();
    }
}
