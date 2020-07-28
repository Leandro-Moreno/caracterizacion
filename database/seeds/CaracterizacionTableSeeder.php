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
            'pegunta1' => '1',
            'unidad_id' => '1',
            'name' => 'Leandro',
            'email' => 'le.moreno910@uniandes.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('h}-ezWGst*57q+r!'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('caracterizacion')->insert([
            'pegunta1' => '1',
            'unidad_id' => '1',
            'name' => 'Laura',
            'name2' => 'Camila',
            'apellido' => 'Reyes',
            'apellido2' => 'Garcia',
            'email' => 'lc.reyes@uniandes.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('h}-ezWGst*57q+r!'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('caracterizacion')->insert([
            'pegunta1' => '1',
            'unidad_id' => '1',
            'name' => 'Paula',
            'name2' => 'Alejandra',
            'apellido' => 'Gonzalez',
            'apellido2' => 'Montoya',
            'email' => 'p.gonzalezm@uniandes.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('h}-ezWGst*57q+r!'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('caracterizacion')->insert([
            'pegunta1' => '1',
            'unidad_id' => '1',
            'name' => 'Andres',
            'name2' => '',
            'apellido' => 'Gonzalez',
            'apellido2' => 'Bernal',
            'email' => 'ca.gonzalezb1@uniandes.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('h}-ezWGst*57q+r!'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('caracterizacion')->insert([
            'pegunta1' => '1',
            'unidad_id' => '1',
            'name' => 'Paola',
            'name2' => 'Alejandra',
            'apellido' => 'Estrella',
            'apellido2' => 'Bolaños',
            'email' => 'p-estrel@uniandes.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('h}-ezWGst*57q+r!'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
