<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    //?---------------PERSONALIZACION DEL MANEJADOR

    //?Traduccion de error en formato json cuando la informacion suministrada al crear/editar sea incorrecta
    //?Convierte una excepcion de invalidacion en una respuesta Json
    protected function invalidJson($request, ValidationException $exception)
    {
        return response()->json([
            'message'=>__('Los datos proporcionados no son válidos.'),
            'errors'=>$exception->errors(),
        ],$exception->status);
    }

    //?Manejador de respuesta cuando el usuario escriba una data no existente o incorrecta
    //?El renderiza una excepcion dentro de una respuesta HTTP
    public function render($request, Throwable $exception)
    {
        if($exception instanceof ModelNotFoundException){
            return response()->json([
                'res' => false,
                "error" => 'Error, modelo no encontrado',
                'status'=> '404 Not Found'
            ],404);
        }
        //?manejador excepciones cuando acceden a ruta sin permiso
        if($exception instanceof RouteNotFoundException){
            return response()->json([
                'res' => false,
                "error" => 'No tienes permiso para acceder a esta ruta',
                'status'=> '401 UNAUTHORIZED'
            ],401);
        }
        return parent::render($request,$exception);
    }

}
