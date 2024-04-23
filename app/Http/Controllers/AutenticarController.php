<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccesoRequest;
use App\Http\Requests\RegistroRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\ValidationException;

class AutenticarController extends Controller
{
    //?register
    public function registro(RegistroRequest $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $user->roles()->attach($request->roles);

        return response()->json([
            'res'=> true,
            'msg' => 'Usuario registrado correctamente'
        ],200);
    }

    //?Login
    public function acceso(AccesoRequest $accesoRequest){
        //?CON EL WITH('nombre del metodo con el que se relaciona')
        $user = User::with('roles')->where('email', $accesoRequest->email)->first();

        if (! $user || ! Hash::check($accesoRequest->password, $user->password)) {
            throw ValidationException::withMessages([
                'msg' => ['Las credenciales son incorrectas.'],
            ]);
        }

        $token = $user->createToken($accesoRequest->email)->plainTextToken;
        return response()->json([
            'res' => true,
            'toke' => $token,
            'User' =>$user
        ],200);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'res'=> true,
            'msg'=> 'Token Elminiado correctamente'
        ]);
    }
}
