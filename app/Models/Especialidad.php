<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    use HasFactory;
    protected $primaryKey = 'idEspecialidad';
    protected $table  = "especialidades";
    protected $fillable = [
        'nombre'
    ];

    protected $hidden = [
        'updated_at',
        'created_at'
    ];

    public function doctores(){
        return $this->hasMany(Doctor::class, 'idEspecialidad', 'idEspecialidad');
    }
}
