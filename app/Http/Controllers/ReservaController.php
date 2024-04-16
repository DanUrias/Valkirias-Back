<?php

namespace App\Http\Controllers;

#Importando modelo 
use App\Models\Reserva;

use Illuminate\Http\Request;

class ReservaController extends Controller
{
    #Ingresar datos 

    public function store (Request $request){
        $data =array(
            'nombres' => $request->nombre,
            'usuario' => $request->usuario,
            'id_hotel'=> $request->hotel,
            'factura'=>$request->factura,
            'fecha_reserva'=>$request->fecha,
            'check in'=>$request->check_in,
            'check out'=>$request->check_out,
            'estadoReserva'=>$request->estadoReserva,
        );

        $nuevaReseva = new Reserva ($data);

        if ($nuevaReserva ->save() == false) {
            return response () -> json(array(
                'message' => "Reserva no hecha, Por favor revise.",
                'data' => $nuevaReserva, 
                'code' => 422 , 
            ),422);
    
        }

        return response () -> json(array(
            'message' => "Reserva hecha con exito :D.",
            'data' => $nuevaReserva, 
            'code' => 201 , 
        ),201);
    }

     # Lista de productos

     public function index(){
        $producto = Reserva:: all();
        if (count($producto)<1){
            return response () -> json(array(
                'message' => "Producto no encontrado.",
                'data' => $producto, 
                'code' =>  404, 
                ),404);
            }
    
            return response () -> json(array(
                'message' => "Listado general de productos.",
                'data' => $producto, 
                'code' => 200 , 
            ),200);
    
            
        }
}

