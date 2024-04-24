<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    # Registro de nuevo cliente 

    public function store(Request $request){ # Aqui lleva el Request
        $request->validated();
        $data = array(
            'names' => $request->name, //Nombre
            'lastnames' => $request->lastname, //Apellido
            'born_date' => $request->bornDate, //Fecha nacimiento
            'dui' =>$request->dui,
            'email' =>$request->email,
            'address' => $request->address, //Direccion
        );

        //INSERT INTO customer () VALUES ();

        $newCustomer = new Customer($data);

        if ($newCustomer->save() == false) {
            return response()->json(array(
                'message' => "Informacion no procesada. Por favor revise.",
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
}
