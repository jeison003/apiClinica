<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctores')->insert([
            ['nombre'=>'Carlos',
            'apellido'=>'Aguilar',
            'correo'=>'Carlos@gmail.com',
            'DNI'=>'16321515',
            'idEspecialidad'=>1],

            ['nombre'=>'Jose',
            'apellido'=>'Ramirez',
            'correo'=>'JoseR@gmail.com',
            'DNI'=>'1515100',
            'idEspecialidad'=>2],

            ['nombre'=>'Maria',
            'apellido'=>'Hernandez',
            'correo'=>'MariaHz@gmail.com',
            'DNI'=>'12432102',
            'idEspecialidad'=>3],
        ]);
    }
}
