<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DoctoresAsignadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctores_asignados')->insert([
            [ 'idDoctor'=>'1', 'idHospital'=>'1'],
            [ 'idDoctor'=>'2', 'idHospital'=>'1'],
            [ 'idDoctor'=>'3', 'idHospital'=>'2']
        ]);
    }
}
