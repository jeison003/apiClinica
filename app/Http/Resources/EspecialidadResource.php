<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;
class EspecialidadResource extends JsonResource
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
            'idEspecialidad' => $this->idEspecialidad,
            'nombre' => Str::upper($this->nombre),
            //?los cree sin dar fecha, por eso no me deja listarlo si le agrego eso
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
