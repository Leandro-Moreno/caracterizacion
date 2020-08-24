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
            'name' => 'Daniela',
            'cargo' => 'Analista',
            'unidad_id' => '25',
            'tipo_contrato' => 'Temporal',
            'apellido' => 'Reyes',
            'documento' => '313546841',
            'celular' => '9999999',
            'direccion' => 'Cra 1 Nº 18A- 12',
            'barrio' => '##########',
            'localidad' => '##########',
            'email' => 'daniela@uniandes.edu.co',
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
            'email' => 'camilo@uniandes.edu.co',
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
        DB::table('users')->insert([
            'rol_id' => '2',
            'estado_id' => '1',
            'tipo_doc' => 'Cédula de ciudadanía',
            'unidad_id' => '1',
            'name' => 'Daniela Facultad',
            'cargo' => 'Analista',
            'unidad_id' => '25',
            'tipo_contrato' => 'Temporal',
            'apellido' => 'Reyes',
            'documento' => '313546841',
            'celular' => '9999999',
            'direccion' => 'Cra 1 Nº 18A- 12',
            'barrio' => '##########',
            'localidad' => '##########',
            'email' => 'danielaf@uniandes.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('facultad'),
            'created_at' => now(),
            
            'updated_at' => now()
        ]);
        #ServiciosSalud   
        DB::table('users')->insert([
            'rol_id' => '3',
            'estado_id' => '1',
            'tipo_doc' => 'Cédula de ciudadanía',
            'unidad_id' => '1',
            'name' => 'Camilo Servicio Salud',
            'cargo' => '',
            'unidad_id' => '25',
            'tipo_contrato' => 'Temporal',
            'apellido' => 'Reyes',
            'documento' => '313546841',
            'celular' => '9999999',
            'direccion' => 'Cra 1 Nº 18A- 12',
            'barrio' => '##########',
            'localidad' => '##########',
            'email' => 'camilos@uniandes.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('serviciosalud'),
            'created_at' => now(),
            
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'rol_id' => '3',
            'estado_id' => '1',
            'tipo_doc' => 'Cédula de ciudadanía',
            'unidad_id' => '15',
            'name' => 'Fabian Servicio Salud',
            'cargo' => 'Asistente',
            'unidad_id' => '25',
            'tipo_contrato' => 'Planta',
            'apellido' => 'Garcia',
            'documento' => '313546841',
            'celular' => '9999999',
            'direccion' => 'Cra 1 Nº 18A- 12',
            'barrio' => '##########',
            'localidad' => '##########',
            'email' => 'fabianserviciosalud@uniandes.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('serviciosalud'),
            'created_at' => now(),
            
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'rol_id' => '2',
            'estado_id' => '1',
            'tipo_doc' => 'Cédula de ciudadanía',
            'unidad_id' => '1',
            'name' => 'Dil Servicio Salud',
            'cargo' => 'Enfermera',
            'unidad_id' => '25',
            'tipo_contrato' => 'Temporal',
            'apellido' => 'Reyes',
            'documento' => '313546841',
            'celular' => '9999999',
            'direccion' => 'Cra 1 Nº 18A- 12',
            'barrio' => '##########',
            'localidad' => '##########',
            'email' => 'dilserviciosalud@uniandes.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('serviciosalud'),
            'created_at' => now(),
            
            'updated_at' => now()
        ]);
        #Servicios Campus
        DB::table('users')->insert([
            'rol_id' => '4',
            'estado_id' => '1',
            'tipo_doc' => 'Cédula de ciudadanía',
            'unidad_id' => '19',
            'name' => 'Andres Servicios Campus',
            'cargo' => 'Ingeniero',
            'unidad_id' => '25',
            'tipo_contrato' => 'Planta',
            'apellido' => 'Garcia',
            'documento' => '313546841',
            'celular' => '9999999',
            'direccion' => 'Cra 1 Nº 18A- 12',
            'barrio' => '##########',
            'localidad' => '##########',
            'email' => 'andresserviciocampus@uniandes.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('serviciocampus'),
            'created_at' => now(),
            
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'rol_id' => '4',
            'estado_id' => '1',
            'tipo_doc' => 'Cédula de ciudadanía',
            'unidad_id' => '19',
            'name' => 'Daniela Servicios Campus',
            'cargo' => '',
            'unidad_id' => '25',
            'tipo_contrato' => 'Temporal',
            'apellido' => 'Reyes',
            'documento' => '313546841',
            'celular' => '9999999',
            'direccion' => 'Cra 1 Nº 18A- 12',
            'barrio' => '##########',
            'localidad' => '##########',
            'email' => 'danielaserviciocampus@uniandes.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('serviciocampus'),
            'created_at' => now(),
            
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'rol_id' => '4',
            'estado_id' => '1',
            'tipo_doc' => 'Cédula de ciudadanía',
            'unidad_id' => '19',
            'name' => 'Camilo Servicios Campus',
            'cargo' => '',
            'unidad_id' => '25',
            'tipo_contrato' => 'Temporal',
            'apellido' => 'Reyes',
            'documento' => '313546841',
            'celular' => '9999999',
            'direccion' => 'Cra 1 Nº 18A- 12',
            'barrio' => '##########',
            'localidad' => '##########',
            'email' => 'camiloserviciocampus@uniandes.edu.co',
            'email_verified_at' => now(),
            'password' => Hash::make('serviciocampus'),
            'created_at' => now(),
            
            'updated_at' => now()
        ]);
    }
}
