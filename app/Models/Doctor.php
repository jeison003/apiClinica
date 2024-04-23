<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $primaryKey = 'idDoctor';
    protected $foreignKey = 'idEspecialidad';
    protected $table = 'doctores';
    protected $fillable =[
        'nombre',
        'apellido',
        'correo',
        'DNI',
        'idEspecialidad'
    ];
    protected $hidden = [
        'updated_at',
        'created_at'
    ];

    public function especialidades(){
        return $this->belongsTo(Especialidad::class,'idEspecialidad');
    }

    public function hospitales(){
        return $this->belongsToMany(Hospital::class, 'doctores_asignados','idDoctor','idHospital');
    }
}
