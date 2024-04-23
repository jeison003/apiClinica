<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarHospitalRequest extends FormRequest
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
            'nombre'=> 'required',
            'correo'=> 'required|unique:hospitales,correo,'.$this->route('hospital')->idHospital,
            'telefono'=> 'required|unique:hospitales,telefono,'.$this->route('hospital')->idHospital,
            'direccion'=> 'required',
        ];
    }
}
