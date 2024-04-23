<?php

namespace Database\Seeders;

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
        $this->call([
            HospitalSeeder::class,
            PacienteSeeder::class,
            EspecialidadSeeder::class,
            DoctorSeeder::class,
            DoctoresAsignadosSeeder::class
        ]);
    }
}
