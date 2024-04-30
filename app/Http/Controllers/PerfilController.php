<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


#Mandar a llamar el modelo 

use App\Models\perfil;

class PerfilController extends Controller
{
     #1. Registro de nuevo usuario (POST)
     public function store(Request $request){ #<--- Request
        #$request->validated();
        $data = array(
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'correo electronico' => $request->correo_electronico,
            'usuario' =>$request->usuario,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'clave' => bcrypt($request->clave)
        );

               

        $newPerfil = new Perfil($data);

        if ($newPerfil->save() == false) {
            return response()->json(array(
                'message' => "Informacion no procesada. Por favor revisar",
                'data' => $data,
                'code' => 422,
            ), 422);
        }

        return response()->json(array(
            'message' => "Cliente guardado con exito.",
            'data' => $data,
            'code' => 201,
        ), 201);

    }

    #2. Listar todos los usuario (GET) 
    public function index(){
    $perfil = Perfil::all();

    #Validacion de existencia de al menos un perfil

        if (count($perfil)<1) {
            return response()->json(array(
                'message' => "No se encontro ningun perfil registrado.",
                'data' => $perfil,
                'code' => 404,
            ), 404);
        }

        return response()->json(array(
            'message' => "Listado general de perfiles.",
            'data' => $perfil,
            'code' => 200,
        ), 200);


        return $perfil;
    }


    #3. Obtener un perfil especifico (GET).
    public function show(Request $request, string $id){  

        $perfil = Perfil::where('id', '=', $id)->first(); 
        if ($perfil == NULL) {
            return response()->json(array(
                'message' => "Perfil no encontrado.",
                'data' => $perfil,
                'code' => 404,
            ), 404);
        }

        return response()->json(array(
            'message' => "Perfil encontrado.",
            'data' => $perfil,
            'code' => 200,
        ), 200);


    }

    #5. Borrar un metodo en especifico (DELETE)
    public function destroy(Request $request , string $id){
        $perfil = Perfil::where('id', '=', $id)->first();  //first: Sirve para indicarle que necesito solo un elemento. 
        if ($perfil == NULL) {
            return response()->json(array(
                'message' => "Cliente no encontrado.",
                'data' => $perfil,
                'code' => 404,
            ), 404);
        }
      
        if ($perfil->delete() == false) {
            return response()->json(array(
                'message' => "Error al borrar cliente.",
                'data' => $perfil,
                'code' => 404,
            ), 404);
        }

        return response()->json(array(
            'message' => "Cliente actualizado con exito.",
            'data' => $perfil,
            'code' => 201,
        ), 201);
    }

    




}
