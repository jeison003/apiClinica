<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActualizarHospitalRequest;
use App\Http\Requests\GuardarHospitalRequest;
use App\Http\Resources\HospitalResource;
use App\Models\Hospital;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class HospitalController extends Controller
{

    public function index()
    {


        //?Asi retornas que pacientes tiene cada hospital
        // $pacientes = Hospital::with('pacientes')->get();
        // return response()->json([
        //     'Pacientes'=>$pacientes
        // ]);
        //?lista solo los hospitales
        // return HospitalResource::collection(Hospital::all());
        return response()->json([
            'res' =>'true',
            'data'=>  HospitalResource::collection(Hospital::all())
        ],Response::HTTP_ACCEPTED);
    }


    public function store(GuardarHospitalRequest $request)
    {
        // return response((new HospitalResource(Hospital::create($request->all())))
        //     ->additional(['msg'=> 'Hospital creado correctamente']), Response::HTTP_CREATED);

        $hospital = Hospital::create($request->all());
        return response()->json([
           'res' =>'true',
           'msg'=>'El hospital fue creado',
           'Hospital'=> (new HospitalResource($hospital))
       ],Response::HTTP_CREATED);
    }

    public function show( $id)
    {
        $hospital = Hospital::where('idHospital',$id)->firstOrFail();
        // return  response (new HospitalResource($hospital), Response::HTTP_OK);
        // $hospital = Hospital::find($id);
        return response()->json([
            'res' =>'true',
            'msg'=>'Hospital encontrado',
            'Data'=> (new HospitalResource($hospital))
        ],Response::HTTP_OK);

    }

  ///? NO FUNCIONA  EL "ActualizarHospitalRequest" problemas de identificar el ID
    public function update(Request $request, $id)
    {
        // $hospital = Hospital::find($id);
        // return response((new HospitalResource($hospital))->additional(['msg'=>'Paciente actualizado']),Response::HTTP_ACCEPTED);

        $hospital = Hospital::where('idHospital',$id)->firstOrFail();
        $hospital->update($request->all());
        return response()->json([
            'res' =>'true',
            'msg'=>'El Hospital fue actualizado',
            'Hospital'=> (new HospitalResource($hospital))
        ],Response::HTTP_ACCEPTED);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id    )
    {
        // return response((new HospitalResource($hospital))->additional(['msg'=>'Paciente eliminado corretamente']),Response::HTTP_OK);
        $hospital = Hospital::find($id);
        $hospital->delete();
        return response()->json([
            'res'=> 'true',
            'msg'=>'El hospital fue borrado'
        ],Response::HTTP_OK);
    }
}
