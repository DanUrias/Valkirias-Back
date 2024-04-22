<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipio;
use App\Models\Departamento;
use App\Models\DepartamentoMunicipio;
use App\Http\Requests\GuardarInfoDepartamento;
use App\Http\Requests\GuardarInfoMunicipio;
use App\Http\Requests\ActualizarDepartamento;
use App\Http\Requests\ActualizarMunicipio;
use App\Http\Requests\GuardarDepMun;
use App\Http\Requests\ActualizarDepMun;

class UbicacionController extends Controller
{
    //listado de deptos
    public function indexDepartamento(){
        $departamento = departamento::all();
        if(count($departamento)<1){
            return response()->json(array(
                'message'=>"DEPARTAMENTOS NO ENCONTRADOS",
                'data'=>$departamento,
                'code'=>404,
            ),404);
        }
        return response()->json(array(
            'message'=>"LISTADO DE DEPARTAMENTOS",
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
                'message'=>"MUNICIPIOS NO ENCONTRADOS",
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

    //busqueda por nombre de departamento
    public function showDepartamento(Request $request, string $nombre){
       //buscar departamento por nombre
        $departamento=departamento::where('nombre','=',$nombre)->first();

        if($departamento==NULL){
            return response()->json(array(
                'message'=>"DEPARTAMENTO NO ENCONTRADO",
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

    //Listando todos los municipios según su departamento

    public function showMunicipio(Request $request, string $departamento_id){
        $municipios = Municipio::where('departamento_id', $departamento_id)->get();
        if($municipios->isEmpty()){
            return response()->json([
                'message' => "No se encontraron municipios",
                'code' => 404,
            ], 404);
        }
        return response()->json([
            'message' => "Municipios encontrados",
            'data' => $municipios,
            'code' => 200,
        ], 200);
    }

     //Creando un nuevo departamento
     public function storeDepartamento(GuardarInfoDepartamento $request){

        $request->validated();
        $data = array(
            'nombre'=>$request->nombre,
        );

        $newDepartamento = new departamento($data);


        if($newDepartamento->save()==false){
            return response()->json(array(
                'message'=>"EL DEPARTAMENTO NO PUDO SER AGREGADO",
                'data'=>$data,
                'code'=>422,
            ),422);
        }
        return response()->json(array(
            'message'=>"DEPARTAMENTO AGREGADO CON EXITO",
            'data'=>$newDepartamento,
            'code'=>201,
        ),201);
    }

     //Creando un nuevo Municipio
     public function storeMunicipio(GuardarInfoMunicipio $request){

        $request->validated();
        $data = array(
            'departamento_id'=>$request->departamento_id,
            'nombre'=>$request->nombre,
        );

        $newMunicipio = new municipio($data);


        if($newMunicipio->save()==false){
            return response()->json(array(
                'message'=>"EL MUNICIPIO NO PUDO SER AGREGADO",
                'data'=>$data,
                'code'=>422,
            ),422);
        }
        return response()->json(array(
            'message'=>"MUNICIPIO AGREGADO",
            'data'=>$newMunicipio,
            'code'=>201,
        ),201);
    }
    
    //actualizando departamento
    public function updateDepartamento(ActualizarDepartamento $request, int $id)
    {
        $request->validated();
        $departamento=departamento::where('id','=',$id)->first();

        if($departamento==NULL){
            return response()->json(array(
                'message'=>"DEPARTAMENTO NO ENCONTRADO",
                'data'=>$departamento,
                'code'=>404,
            ),404);
        }
        $departamento->nombre=$request->nombre;

        if($departamento->save()==false){
            return response()->json(array(
                'message'=>"NO SE ACTUALIZO EL DEPARTAMENTO",
                'data'=>$departamento,
                'code'=>422,
            ),422);
        }
        return response()->json(array(
            'message'=>"DEPARTAMENTO ACTUALIZADO CON EXITO",
            'data'=>$departamento,
            'code'=>200,
        ),200);
    }

    //actualizando municipio
    public function updateMunicipio(ActualizarMunicipio $request, int $id)
    {
        $request->validated();
        $municipio=municipio::where('id','=',$id)->first();

        if($municipio==NULL){
            return response()->json(array(
                'message'=>"MUNICIPIO NO ENCONTRADO",
                'data'=>$municipio,
                'code'=>404,
            ),404);
        }
        $municipio->departamento_id=$request->departamento_id;
        $municipio->nombre=$request->nombre;


        if($municipio->save()==false){
            return response()->json(array(
                'message'=>"MUNICIPIO NO ACTUALIZADO",
                'data'=>$municipio,
                'code'=>422,
            ),422);
        }
        return response()->json(array(
            'message'=>"MUNICIPIO ACTUALIZADO CON EXITO",
            'data'=>$municipio,
            'code'=>200,
        ),200);
    }

}
