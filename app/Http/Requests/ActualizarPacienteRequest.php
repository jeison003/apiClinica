<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarPacienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombres'=> 'required',
            'apellidos'=> 'required',
            'edad'=> 'required',
            'sexo'=> 'required',
            //?Esta condicion indica que el ID que recibe por la ruta(url o dentro del modelo url), coincida con el ID
            //? del objeto a modificar, permitiendo asi su modificacion o dejar el DNI igual
            'dni'=> 'required|unique:pacientes,dni,'.$this->route('paciente')->idPaciente,
            'tipo_sangre'=> 'required',
            'telefono'=> 'required',
            'correo'=> 'required',
            'direccion'=> 'required',
            'idHospital'=> 'required'
        ];
    }
}
