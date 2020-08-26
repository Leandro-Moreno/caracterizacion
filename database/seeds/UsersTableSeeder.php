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

        #SAdministradores
        DB::table('users')->insert([
            'rol_id' => '5',
            'estado_id' => '1',
            'tipo_doc' => 'Cédula de ciudadanía',
            'unidad_id' => '11',
            'name' => 'Leandro',
            'apellido' => 'Moreno',
            'email' => 'le.moreno910@uniandes.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('111111'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'rol_id' => '5',
            'estado_id' => '1',
            'tipo_doc' => 'Cédula de ciudadanía',
            'unidad_id' => '11',
            'name' => 'Andres',
            'cargo' => 'Ingeniero Sitios Web',
            'apellido' => 'Gonzalez',
            'email' => 'ca.gonzalezb1@uniandes.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('casco'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        #Empleado
        DB::table('users')->insert([
            'rol_id' => '1',
            'estado_id' => '1',
            'tipo_doc' => 'Cédula de ciudadanía',
            'unidad_id' => '1',
            'name' => 'Edel',
            'cargo' => 'Analista',
            'unidad_id' => '25',
            'tipo_contrato' => 'Temporal',
            'apellido' => 'Reyes',
            'documento' => '313546841',
            'celular' => '9999999',
            'direccion' => 'Cra 1 Nº 18A- 12',
            'barrio' => '##########',
            'localidad' => '##########',
            'email' => 'eamaya@uniandes.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('empleado'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'rol_id' => '3',
            'estado_id' => '1',
            'tipo_doc' => 'Cédula de ciudadanía',
            'unidad_id' => '1',
            'name' => 'Camilo',
            'cargo' => 'Secretario',
            'unidad_id' => '25',
            'tipo_contrato' => 'Temporal',
            'apellido' => 'Reyes',
            'documento' => '313546841',
            'celular' => '9999999',
            'direccion' => 'Cra 1 Nº 18A- 12',
            'barrio' => '##########',
            'localidad' => '##########',
            'email' => 'elasso@uniandes.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('empleado'),
            'created_at' => now(),

            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'rol_id' => '1',
            'estado_id' => '1',
            'tipo_doc' => 'Cédula de ciudadanía',
            'unidad_id' => '1',
            'name' => 'Fabian',
            'cargo' => 'Asistente',
            'unidad_id' => '25',
            'tipo_contrato' => 'Planta',
            'apellido' => 'Garcia',
            'documento' => '313546841',
            'celular' => '9999999',
            'direccion' => 'Cra 1 Nº 18A- 12',
            'barrio' => '############',
            'localidad'=> '############',
            'email' => 'fabian@uniandes.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('empleado'),
            'created_at' => now(),

            'updated_at' => now()
        ]);
        #Facultad
        DB::table('users')->insert([
            'rol_id' => '2',
            'estado_id' => '1',
            'tipo_doc' => 'Cédula de ciudadanía',
            'unidad_id' => '1',
            'name' => 'Decano Facultad',
            'cargo' => 'Decano',
            'unidad_id' => '25',
            'tipo_contrato' => 'Temporal',
            'apellido' => 'Reyes',
            'documento' => '313546841',
            'celular' => '9999999',
            'direccion' => 'Cra 1 Nº 18A- 12',
            'barrio' => '##########',
            'localidad' => '##########',
            'email' => 'facultad@uniandes.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('facultad'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'rol_id' => '2',
            'estado_id' => '1',
            'tipo_doc' => 'Cédula de ciudadanía',
            'unidad_id' => '1',
            'name' => 'Andres Facultad',
            'cargo' => 'Ingeniero',
            'unidad_id' => '25',
            'tipo_contrato' => 'Planta',
            'apellido' => 'Garcia',
            'documento' => '313546841',
            'celular' => '9999999',
            'direccion' => 'Cra 1 Nº 18A- 12',
            'barrio' => '##########',
            'localidad' => '##########',
            'email' => 'andresf@uniandes.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('facultad'),
            'created_at' => now(),

            'updated_at' => now()
        ]);
    }
}
