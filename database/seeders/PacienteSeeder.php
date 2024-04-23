<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pacientes')->insert([
            [
                'nombres' => 'Alex Oscar',
                'apellidos' => 'Gamarra ',
                'edad' => 28,
                'sexo' => 'Masculino',
                'dni' => 421551,
                'tipo_sangre' => 'A+',
                'telefono' => 4512131,
                'correo' => 'ale@gmail.com',
                'direccion' => 'av casa 2e3',
                'idHospital' => 1,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'nombres' => 'Oscar',
                'apellidos' => 'Cantillo ',
                'edad' => 25,
                'sexo' => 'Masculino',
                'dni' => 8421551,
                'tipo_sangre' => 'O+',
                'telefono' => 19451212,
                'correo' => 'Oscar@gmail.com',
                'direccion' => 'av casa 53 lolo',
                'idHospital' => 1,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'nombres' => 'Camila',
                'apellidos' => 'Guitierrez ',
                'edad' => 29,
                'sexo' => 'Femenino',
                'dni' => 816161,
                'tipo_sangre' => 'A-',
                'telefono' => 983122,
                'correo' => 'Camila@gmail.com',
                'direccion' => 'Cr23 edificio 2',
                'idHospital' => 1,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'nombres' => 'Daniela',
                'apellidos' => 'Marin ',
                'edad' => 20,
                'sexo' => 'Femenino',
                'dni' => 265822,
                'tipo_sangre' => 'O-',
                'telefono' => 4523122,
                'correo' => 'Camila@Daniela.com',
                'direccion' => 'Cr23 edificio 4',
                'idHospital' => 2,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'nombres' => 'Jose',
                'apellidos' => 'Matinez ',
                'edad' => 25,
                'sexo' => 'Masculino',
                'dni' => 6251551,
                'tipo_sangre' => 'O+',
                'telefono' => 35511312,
                'correo' => 'Jose@gmail.com',
                'direccion' => 'av 8 casa 3 lolo',
                'idHospital' => 2,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'nombres' => 'Daniel',
                'apellidos' => 'Matinez ',
                'edad' => 22,
                'sexo' => 'Masculino',
                'dni' => 3651551,
                'tipo_sangre' => 'O+',
                'telefono' => 6611312,
                'correo' => 'Daniel@gmail.com',
                'direccion' => 'av 7 casa 5 lolo2',
                'idHospital' => 2,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'nombres' => 'Diana',
                'apellidos' => 'Huiguita ',
                'edad' => 20,
                'sexo' => 'Femenino',
                'dni' => 3265822,
                'tipo_sangre' => 'O+',
                'telefono' => 9923122,
                'correo' => 'Diana@Daniela.com',
                'direccion' => 'Cr23 edificio 8',
                'idHospital' => 2,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ]
        ]);
    }
}
