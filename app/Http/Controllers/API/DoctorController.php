<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActualizarDoctorRequest;
use App\Http\Requests\GuardarDoctorRequest;
use App\Http\Resources\DoctoresResource;
use App\Models\Doctor;
use App\Models\Especialidad;
use App\Models\Hospital;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function index()
    {
        return DoctoresResource::collection(Doctor::all());
    }


    public function store(GuardarDoctorRequest $request)
    {
        // $doctor = Doctor::create($request->all());
        // return response()->json([
        //     'res'=>'true',
        //     'msg'=> 'El doctor-a fue creado-a',
        //     'data'=> (new DoctoresResource($doctor))
        // ]);
        if(Especialidad::where('idEspecialidad', $request -> idEspecialidad )->first()
         && Hospital::where('idHospital', $request -> idHospital )->first()){
        
            $doctor = new Doctor();
            $doctor -> nombre = $request->nombre;
            $doctor -> apellido = $request->apellido;
            $doctor -> correo = $request->correo;
            $doctor -> DNI = $request->DNI;
            $doctor -> idEspecialidad = $request->idEspecialidad;
            $doctor->save();
            $doctor->hospitales()->attach($request->idHospital);
            return response()->json([
                'res'=> true,
                'msg' => 'Usuario registrado correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=> false,
                'msg' => 'Hospital o especialidad no encontrada',

            ],400);
        }
    }

    public function show($id)
    {
        // $especialidad = Especialidad::where('idEspecialidad',$id)->firstOrFail();
        //?find()funciona cuando el id de la tabla sigue el estandar de nombre en laravel (id)
        $doctor = Doctor::find($id);
        // $doctor = Doctor::where('idDoctor',$id)->firstOrFail();
        return response()->json([
            'res'=> 'true',
            'data'=> (new DoctoresResource($doctor))
        ]);
    }

    public function update(Request $request, $id)
    {
        $doctor=Doctor::where('idDoctor',$id)->firstOrFail();
        $doctor->update($request->all());
        return response()->json([
            'res'=>'true',
            'msg'=>'Doctor actualizado exitosamente',
            'data'=> (new DoctoresResource($doctor))
        ]);
    }

    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();
        return response()->json([
            'res'=> 'true',
            'msg'=> 'Doctor eliminado exitosamente'
        ]);
    }
}
