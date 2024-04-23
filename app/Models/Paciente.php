<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $primaryKey = 'idPaciente';
    protected $foreignKey = 'idHospital';
    protected $fillable =[
            'nombres',
            'apellidos',
            'edad',
            'sexo',
            'dni',
            'tipo_sangre',
            'telefono',
            'correo',
            'direccion',
            'idHospital'
    ];
    protected $hidden = [
    'updated_at',
    'created_at'
    ];

    public function hospitales(){
        return $this->belongsTo(Hospital::class, 'idHospital', 'idHospital');
    }
}
