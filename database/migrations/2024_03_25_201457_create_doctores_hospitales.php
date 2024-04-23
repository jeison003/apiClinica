<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctoresHospitales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctores_asignados', function (Blueprint $table) {
            $table->unsignedInteger('idDoctor');
            $table->foreign('idDoctor')->references('idDoctor')->on('doctores')->onDelete('cascade');

            $table->unsignedInteger('idHospital');
            $table->foreign('idHospital')->references('idHospital')->on('hospitales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctores_asignados');
    }
}
