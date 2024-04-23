<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctoresResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'idDoctor'=>$this->idDoctor,
            'nombre'=>$this->nombre,
            'apellido'=>$this->apellido,
            'correo'=>$this->correo,
            'DNI'=>$this->DNI,
            // 'idEspecialidad'=>$this->idEspecialidad,
            'especialidad'=> (new DoctoresResource($this->especialidades))->makeVisible('nombre'),

            // 'created_at' => $this->created_at->format('d-m-Y'),
            // 'updated_at' => $this->updated_at->format('d-m-Y')
        ];
    }
    public function with($request)
    {
        return[
            'res' => true,
        ];
    }
}
