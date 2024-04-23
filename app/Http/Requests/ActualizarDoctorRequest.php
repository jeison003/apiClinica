<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarDoctorRequest extends FormRequest
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

                'nombre'=>'required',
                'apellido'=>'required',
                'correo'=>'required|unique:App\Models\Doctor,correo,'.$this->route('doctores')->idDoctor,
                'DNI'=>'required|unique:App\Models\Doctor,DNI,'.$this->route('doctores')->idDoctor,
        ];
    }
}
