<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([RolesTableSeeder::class]);
        $this->call([UnidadesTableSeeder::class]);
        $this->call([UsersTableSeeder::class]);
        $this->call([CaracterizacionTableSeeder::class]);
        $this->call([CorreoTableSeeder::class]);
    }
}
