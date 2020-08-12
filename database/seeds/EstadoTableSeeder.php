<?php

use Illuminate\Database\Seeder;
use App\Model\Estado;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert([
            'nombre'=> 'Activo',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('estados')->insert([
            'nombre'=> 'Inactivo',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
