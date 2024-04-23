<?php

use App\Http\Controllers\API\DoctorController;
use App\Http\Controllers\API\EspecialidadController;
use App\Http\Controllers\API\HospitalController;
use App\Http\Controllers\API\PacienteController;
use App\Http\Controllers\AutenticarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::prefix('pacientes')->group(function(){
//     Route::get('/',[PacienteController::class, 'index']);
//     Route::post('/',[PacienteController::class, 'store']);
//     // Route::get('/{id}',[PacienteController::class, 'show']);
//     //?aqui pasas el MODELO paciente
//     Route::get('/{paciente}',[PacienteController::class, 'show']);
//     Route::put('/{paciente}',[PacienteController::class, 'update']);
//     Route::delete('/{paciente}',[PacienteController::class, 'destroy']);
// });



Route::post('registro',[AutenticarController::class, 'registro']);
Route::post('acceso',[AutenticarController::class, 'acceso']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout',[AutenticarController::class, 'logout']);
    Route::apiResource('pacientes',PacienteController::class);
    Route::apiResource('hospitales',HospitalController::class);
    Route::apiResource('especialidades',EspecialidadController::class);
    Route::apiResource('doctores',DoctorController::class);
});
