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
      $unidad = new Unidad();
      $unidad->nombre_unidad="Unidad 1";
      $unidad->dependecia="Dependecia x";
      $unidad->save();

      $unidad = new Unidad();
      $unidad->nombre_unidad="Unidad 2";
      $unidad->dependecia="Dependecia x";
      $unidad->save();

      $unidad = new Unidad();
      $unidad->nombre_unidad="Unidad 3";
      $unidad->dependecia="Dependecia x";
      $unidad->save();
    }
}
