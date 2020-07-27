<?php

use Illuminate\Database\Seeder;
use App\Correo;

class CorreoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $correo = new Correo();
      $correo->host = "smtp.mailtrap.io";
      $correo->driver = "smtp";
      $correo->port = "2525";
      $correo->encryption = "tls";
      $correo->username = "49bd994c8aa57d";
      $correo->address = "correo@uniandes.edu.co";
      $correo->password = "57cb4be80f8d9e";
      $correo->name = "Certificados";
      $correo->save();
    }
}
