<?php

namespace App\Http\Resources;

use App\Models\Hospital;
use Illuminate\Http\Resources\Json\ResourceCollection;

//?NO ME SIRVIO PARA LO QUE QUERIA
class HospitalCollection extends ResourceCollection
{
    // public $pacientes = Hospital::class;

    public function toArray($request)
    {
        return [
            'data'=>$this->collection,
            'res'=>true
        ];
    }
}
