<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActualizarPacienteRequest;
use App\Http\Requests\GuardarPacienteRequest;
use App\Http\Resources\PacienteResource;
use App\Models\Paciente;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PacienteController extends Controller
{
    public function index()
    {
        return response()->json([
            'res' =>'true',
            'data'=> PacienteResource::collection(Paciente::all())
        ],Response::HTTP_ACCEPTED);
        // return PacienteResource::collection(Paciente::all());
        // $listHospital = Hospital::all();
        //  return PacienteResource::collection(Paciente::paginate(3));
        // $pacientes = Paciente::where('idHospital',$listHospital->idHospital)->get();
        // $pacientes = Paciente::whereBelongsTo($listHospital)->get();

        //?METODO PARA RETORNAR LOS PACIENTES JUNTOS CON EL OBJETO DE HOSPITAL CON EL QUE SE RELACIONAN
        // $pacientes = Paciente::with('hospitales')->get();
        // return response()->json([
        //     'Pacientes'=>$pacientes
        // ]);
        //  return PacienteResource::collection(Paciente::all());

    }

    public function store(GuardarPacienteRequest $request)
    {
            Paciente::where('idHospital',$request->idHospital)->first();
            try{
                $paciente = Paciente::create($request->all());
                return response()->json([
                'res' =>'true',
                'msg'=>'El paciente fue creado',
                'data'=> (new PacienteResource($paciente))
                ],Response::HTTP_CREATED);

            }catch(QueryException $e){
                return response()->json([
                    'res'=>'false',
                    'msg'=> 'Hospital no encontrado'
                ]);
            }
             // Paciente::create($request->all());
        // return response()->json([
        //     'res' => true,
        //     'msg' => 'Paciente guardado'
        // ],200);
        //?usando el PacienteResource nos facilita las respuesta HTTP y la transformacion de la data que mostraremos
        // return  response ((new PacienteResource(Paciente::create($request->all())))
        //     ->additional(['msg' => 'Paciente guardado correctamente']), Response::HTTP_CREATED );

    }

   //?Mostrar recibiendo PACIENTE
    public function show($id)
    {
        // return response()->json([
        //     'res'=>true,
        //     'paciente'=>$paciente
        // ],200);
        // return  response (new PacienteResource($paciente), Response::HTTP_OK);

        $paciente = Paciente::find($id);
        return response()->json([
            'res' =>'true',
            'msg'=>'Paciente encontrado',
            'data'=> (new PacienteResource($paciente))
        ],Response::HTTP_OK);
    }

    //?Mostrar recibiendo ID
    // public function show($id)
    // {
    //     return response()->json([
    //         'res'=>true,
    //         'paciente'=>Paciente::find($id)
    //     ]);
    // }

    public function update(Request $request, $id)
    {
        ///? NO FUNCIONA  EL "ActualizarPacienteRequest" problemas de identificar el DI
        // return response((new PacienteResource($paciente))->additional(['msg'=>'Paciente actualizado']),Response::HTTP_ACCEPTED);
        $paciente = Paciente::where('idPaciente',$id)->firstOrFail();
        Paciente::where('idHospital',$request->idHospital)->first();
        try{
            $paciente->update($request->all());
            return response()->json([
                'res' =>'true',
                'msg'=>'El Paciente fue actualizado',
                'data'=> (new PacienteResource($paciente))
            ],Response::HTTP_ACCEPTED);
        }catch(QueryException $e){
            return response()->json([
                'res'=>'false',
                'msg'=> 'Hospital no encontrado'
            ]);
        }

    }

    public function destroy( $id)
    {
        // return response()->json([
        //     'res'=>true,
        //     'Mensaje'=> 'Paciente eliminado corretamente'
        // ],200);
        // return response((new PacienteResource($paciente))->additional(['msg'=>'Paciente eliminado corretamente']),Response::HTTP_OK);

        $paciente =  Paciente::where('idPaciente',$id)->firstOrFail();
        $paciente->delete();
        return response()->json([
            'res'=> 'true',
            'msg'=>'Paciente borrado exitosamente'
        ],Response::HTTP_OK);
    }


}
