<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;
class HospitalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'idHospital' => $this->idHospital,
            'nombre' => Str::upper($this->nombre),
            'correo' => Str::of($this->correo)->upper(),
            'telefono' => $this->telefono,
            'direccion' => Str::upper($this->direccion),
            // 'Pacientes:'=> HospitalResource::collection($this->pacientes),
            'created_at' => $this->created_at->format('d-m-Y'),
            'updated_at' => $this->updated_at->format('d-m-Y')

        ];
    }
    public function with($request)
    {
        return[
            'res' => true,
        ];
    }
}
