<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hospitales')->insert([
            [
                'nombre' => 'Hospital 1',
                'correo' => 'hospital1@gmail.com',
                'telefono' => '304551616',
                'direccion' => 'El parque',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')

            ],
            [
                'nombre' => 'Hospital 2',
                'correo' => 'hospital2@gmail.com',
                'telefono' => '30255432',
                'direccion' => 'La Concepcion',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
        ]);
    }
}
