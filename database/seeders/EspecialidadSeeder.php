<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('especialidades')->insert([
            ['nombre'=> 'Ginecologo'],
            ['nombre'=> 'Pediatria'],
            ['nombre'=> 'Anestesia'],
            ['nombre'=> 'Cirujano'],
        ]);
    }
}
