<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'rol_id' => '5',
            'unidad_id' => '11',
            'name' => 'Leandro',
            'email' => 'le.moreno910@uniandes.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('111111'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'rol_id' => '5',
            'unidad_id' => '11',
            'name' => 'Andres',
            'email' => 'ca.gonzalezb1@uniandes.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('h}-ezWGst*57q+r!'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'rol_id' => '1',
            'unidad_id' => '1',
            'name' => 'Daniela',
            'cargo' => 'Analista',
            'unidad_id' => '25',
            'tipo_contrato' => 'Temporal',
            'apellido' => 'Reyes',
            'documento' => '313546841',
            'celular' => '9999999',
            'direccion' => 'Cra 1 Nº 18A- 12',
            'direccion2' => 'La Candelaria | Candelaria',
            'email' => 'daniela@uniandes.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('h}-ezWGst*57q+r!'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'rol_id' => '1',
            'unidad_id' => '1',
            'name' => 'Camilo',
            'cargo' => 'Secretario',
            'unidad_id' => '25',
            'tipo_contrato' => 'Temporal',
            'apellido' => 'Reyes',
            'documento' => '313546841',
            'celular' => '9999999',
            'direccion' => 'Cra 1 Nº 18A- 12',
            'direccion2' => 'La Candelaria | Candelaria',
            'email' => 'camilo@uniandes.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('h}-ezWGst*57q+r!'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'rol_id' => '1',
            'unidad_id' => '1',
            'name' => 'Fabian',
            'cargo' => 'Asistente',
            'unidad_id' => '25',
            'tipo_contrato' => 'Planta',
            'apellido' => 'Garcia',
            'documento' => '313546841',
            'celular' => '9999999',
            'direccion' => 'Cra 1 Nº 18A- 12',
            'direccion2' => 'La Candelaria | Candelaria',
            'email' => 'fabian@uniandes.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('h}-ezWGst*57q+r!'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'rol_id' => '2',
            'unidad_id' => '1',
            'name' => 'Dil',
            'cargo' => 'Secretario',
            'unidad_id' => '25',
            'tipo_contrato' => 'Temporal',
            'apellido' => 'Reyes',
            'documento' => '313546841',
            'celular' => '9999999',
            'direccion' => 'Cra 1 Nº 18A- 12',
            'direccion2' => 'La Candelaria | Candelaria',
            'email' => 'dil@uniandes.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('h}-ezWGst*57q+r!'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'rol_id' => '2',
            'unidad_id' => '1',
            'name' => 'Andres',
            'cargo' => 'Ingeniero',
            'unidad_id' => '25',
            'tipo_contrato' => 'Planta',
            'apellido' => 'Garcia',
            'documento' => '313546841',
            'celular' => '9999999',
            'direccion' => 'Cra 1 Nº 18A- 12',
            'direccion2' => 'La Candelaria | Candelaria',
            'email' => 'andres@uniandes.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('h}-ezWGst*57q+r!'),
            'created_at' => now(),
            'updated_at' => now()
        ]);


    }
}
