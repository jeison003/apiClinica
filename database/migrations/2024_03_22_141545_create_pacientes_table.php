<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('idPaciente');
            $table->string('nombres',50);
            $table->string('apellidos',60);
            $table->string('edad');
            $table->string('sexo');
            $table->string('dni',8)->unique();
            $table->string('tipo_sangre',2);
            $table->string('telefono',20);
            $table->string('correo')->unique();
            $table->string('direccion');

            $table->integer('idHospital')->unsigned();
            $table->foreign('idHospital')->references('idHospital')->on('hospitales');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
