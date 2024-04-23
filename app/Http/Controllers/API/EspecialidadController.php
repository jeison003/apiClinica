<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuardarEspecialidadRequest;
use App\Http\Resources\EspecialidadResource;
use App\Models\Especialidad;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EspecialidadController extends Controller
{

    public function index()
    {
        // return EspecialidadResource::collection(Especialidad::all());
        return response()->json([
            'res' =>'true',
            'data'=> EspecialidadResource::collection(Especialidad::all())
        ],Response::HTTP_ACCEPTED);
    }

    public function store(GuardarEspecialidadRequest $request)
    {
        // return response( (new EspecialidadResource(Especialidad::create($request->all())))
        //             ->additional(['msg'=> 'Especialidad creada']),Response::HTTP_CREATED);
        $especialidad = Especialidad::create($request->all());
         return response()->json([
            'res' =>'true',
            'msg'=>'La especialidad fue creada',
            'especialidad'=> (new EspecialidadResource($especialidad))
        ],Response::HTTP_CREATED);
    }


    public function show($id)
    {
        // return response(new EspecialidadResource($especialidad), Response::HTTP_OK);
        $especialidad = Especialidad::find($id);
        return response()->json([
            'res' =>'true',
            'msg'=>'Especialidad encontrada',
            'especialidad'=> (new EspecialidadResource($especialidad))
        ],Response::HTTP_OK);

    }


    public function update(GuardarEspecialidadRequest $request, $id)
    {
        // return response()->json(EspecialidadResource($especialidad));

        $especialidad = Especialidad::where('idEspecialidad',$id)->firstOrFail();
        $especialidad->update($request->all());
        return response()->json([
            'res' =>'true',
            'msg'=>'La especialidad fue actualizada',
            'especialidad'=> (new EspecialidadResource($especialidad))
        ],Response::HTTP_ACCEPTED);
    }


    public function destroy($id)
    {
        $especialidad =  Especialidad::where('idEspecialidad',$id)->firstOrFail();
        $especialidad->delete();
        return response()->json([
            'res'=> 'true',
            'msg'=>'La especialidad fue borrada'
        ],Response::HTTP_OK);
    }
}
