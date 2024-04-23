<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
    protected $primaryKey = 'idHospital';
    protected $table  = "hospitales";
    protected $fillable =[
        'nombre',
        'correo',
        'telefono',
        'direccion',
    ];

    protected $hidden = [
        'updated_at',
        'created_at'
        ];
    public function pacientes(){
        return $this->hasMany(Paciente::class, 'idHospital', 'idHospital');
    }
    public function doctores(){
        return $this->belongsToMany(Doctor::class, 'doctores_asignados','idHospital','idDoctor');
    }
}
