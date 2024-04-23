<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctores', function (Blueprint $table) {
            $table->increments('idDoctor');
            $table->string('nombre',50);
            $table->string('apellido',50);
            $table->string('correo')->unique();;
            $table->string('DNI')->unique();

            $table->integer('idEspecialidad')->unsigned();
            $table->foreign('idEspecialidad')->references('idEspecialidad')->on('especialidades');
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
        Schema::dropIfExists('doctores');
    }
}
