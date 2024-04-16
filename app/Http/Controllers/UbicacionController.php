<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipio;
use App\Models\Departamento;
use App\Models\Distritos;
use App\Http\Requests\SaveInfoDepartamento;
use App\Http\Requests\SaveInfoMunicipio;

class UbicacionController extends Controller
{
    //listado de deptos
    public function indexDepartamento(){
        $departamento = departamento::all();
        if(count($departamento)<1){
            return response()->json(array(
                'message'=>"No se encontraron Departamentos.",
                'data'=>$departamento,
                'code'=>404,
            ),404);
        }
        return response()->json(array(
            'message'=>"LISTADO DE Departamentos",
            'data'=>$departamento,
            'code'=>200,
        ),200);
    }

    //listado municipios
    public function indexMunicipio(){
        //listado por municipios
        $municipio = municipio::all();
        if(count($municipio)<1){
            return response()->json(array(
                'message'=>"No se encontraron Municipios.",
                'data'=>$municipio,
                'code'=>404,
            ),404);
        }
        return response()->json(array(
            'message'=>"LISTADO DE MUNICIPIOS",
            'data'=>$municipio,
            'code'=>200,
        ),200);
    }

    #Listado distritos
    public function indexDistrito(){
        # Listado por distrito
        $distrito = Distritos ::all();
        if(count($distrito)<1){
            return response()->json(array(
                'message'=>"No se encontraron Distritos.",
                'data'=>$distrito,
                'code'=>404,
            ),404);
        }
        return response()->json(array(
            'message'=>"Listado de Distritos",
            'data'=>$distrito,
            'code'=>200,
        ),200);
    }

    //busqueda por nombre de departamento
    public function showDepartamento(Request $request, string $nombre){
       //buscar departamento por nombre
        $departamento=departamento::where('nombre','=',$nombre)->first();

        if($departamento==NULL){
            return response()->json(array(
                'message'=>"Departamento no encontrado.",
                'data'=>$departamento,
                'code'=>404,
            ),404);
        }
        return response()->json(array(
            'message'=>"DEPARTAMENTO ENCONTRADO",
            'data'=>$departamento,
            'code'=>200,
        ),200);
    }

    //busqueda por nombre de municipio
    public function showMunicipio(Request $request, string $nombre){
        //buscar departamento por nombre
         $municipio=municipio::where('nombre','=',$nombre)->first();
 
         //Validando
         if($municipio==NULL){
             return response()->json(array(
                 'message'=>"Municipio no encontrado.",
                 'data'=>$municipio,
                 'code'=>404,
             ),404);
         }
         return response()->json(array(
             'message'=>"MUNICIPIO ENCONTRADO",
             'data'=>$municipio,
             'code'=>200,
         ),200);
     }

     #Busqueda por nombre de distrito
    public function showDistrito(Request $request, string $nombre){
        #Busqueda de distrito 
         $distrito=Distritos::where('nombre','=',$nombre)->first();
 
         #Validando
         if($distrito==NULL){
             return response()->json(array(
                 'message'=>"Municipio no encontrado.",
                 'data'=>$distrito,
                 'code'=>404,
             ),404);
         }
         return response()->json(array(
             'message'=>"Distrito encontrado",
             'data'=>$distrito,
             'code'=>200,
         ),200);
     }



     # Creando un nuevo distrito
     public function storeDistrito(Request $request){

        $request->validated();
        $data = array(
            'nombre'=>$request->nombre,
        );

        $newDistrito = new Distritos ($data);


        if($newDistrito->save()==false){
            return response()->json(array(
                'message'=>"El distrito no pudo ser agregado",
                'data'=>$data,
                'code'=>422,
            ),422);
        }
        return response()->json(array(
            'message'=>"Distrito agregado",
            'data'=>$newDistrito,
            'code'=>201,
        ),201);
    }

    //Creando un nuevo departamento
    public function storeDepartamento(SaveInfoDepartamento $request){

        $request->validated();
        $data = array(
            'nombre'=>$request->nombre,
        );

        $newDepartamento = new departamento($data);


        if($newDepartamento->save()==false){
            return response()->json(array(
                'message'=>"EL departamento no pudo ser agregado",
                'data'=>$data,
                'code'=>422,
            ),422);
        }
        return response()->json(array(
            'message'=>"Departamento agregado",
            'data'=>$newDepartamento,
            'code'=>201,
        ),201);
    }

     //Creando un nuevo Municipio
     public function storeMunicipio(SaveInfoMunicipio $request){

        $request->validated();
        $data = array(
            'departamento_id'=>$request->departamento_id,
            'nombre'=>$request->nombre,
        );

        $newMunicipio = new municipio($data);


        if($newMunicipio->save()==false){
            return response()->json(array(
                'message'=>"EL municipio no pudo ser agregado",
                'data'=>$data,
                'code'=>422,
            ),422);
        }
        return response()->json(array(
            'message'=>"Municipio agregado",
            'data'=>$newMunicipio,
            'code'=>201,
        ),201);
    }
    
    //actualizando departamento
    public function updateDepartamento(Request $request, int $id)
    {
        $departamento=departamento::where('id','=',$id)->first();

        if($departamento==NULL){
            return response()->json(array(
                'message'=>"Departamento no encontrado.",
                'data'=>$departamento,
                'code'=>404,
            ),404);
        }
        $departamento->nombre=$request->nombre;

        if($departamento->save()==false){
            return response()->json(array(
                'message'=>"Departamento no actualizado",
                'data'=>$departamento,
                'code'=>422,
            ),422);
        }
        return response()->json(array(
            'message'=>"Departamento actualizado con exito",
            'data'=>$departamento,
            'code'=>200,
        ),200);
    }

    //actualizando municipio
    public function updateMunicipio(Request $request, int $id)
    {
        $municipio=municipio::where('id','=',$id)->first();

        if($municipio==NULL){
            return response()->json(array(
                'message'=>"Municipio no encontrado.",
                'data'=>$municipio,
                'code'=>404,
            ),404);
        }
        $municipio->departamento_id=$request->departamento_id;
        $municipio->nombre=$request->nombre;


        if($municipio->save()==false){
            return response()->json(array(
                'message'=>"Municipio no actualizado",
                'data'=>$municipio,
                'code'=>422,
            ),422);
        }
        return response()->json(array(
            'message'=>"Municipio actualizado con exito",
            'data'=>$municipio,
            'code'=>200,
        ),200);
    }

}
