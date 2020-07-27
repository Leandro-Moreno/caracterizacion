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
      $user->nombre="administrador";
      $user->save();

      $user = new Rol();
      $user->nombre="asistente";
      $user->save();
    }
}
