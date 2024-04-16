<?php

use App\Http\Controllers\UbicacionController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

#Ruta para listar Departamentos
Route::get("/index-departamento",array(
    UbicacionController::class,
    'index.Departamento',
));

#Ruta para listar Municipios
Route::get("/index-municipio",array(
    UbicacionController::class,
    'index.Municipio',
));

#Ruta para listar Distritos
Route::get("/index-distrito",array(
    UbicacionController::class,
    'index.Distrito',
));


//Ruta para listar un departamento
Route::get("/show-departamento/{nombre}",array(
    UbicacionController::class,
    'showDepartamento',
));

#Ruta para listar un municipio
Route::get("/show-municipio/{nombre}",array(
    UbicacionController::class,
    'showMunicipio',
));

#Ruta para listar distrito
Route::get("/show-distrito/{nombre}",array(
    UbicacionController::class,
    'show.Distrito',
));

//Ruta para agregar un nuevo departamento
Route::post('/store/departamento',array(  
    UbicacionController::class,
    'storeDepartamento',
));
//Ruta para agregar un municipio
Route::post('/store/municipio',array(  
    UbicacionController::class,
    'storeMunicipio',
));

#Ruta para agregar distrito

// Route::post('/store/distritos',array(  
//     UbicacionController::class,
//     'store.Distrito',
// ));

Route::post("/distritos/store",array(
    UbicacionController::class,
    'store',
))->name('distritos.store');

//Routa para modificar municipio 
Route::put('/update/departamento/{id}',array(  
    UbicacionController::class,
    'updateDepartamento',
));
//Ruta para actualizar municipio
Route::put('/update/municipio/{id}',array(  
    UbicacionController::class,
    'updateMunicipio',
)); 

#Ruta para actualizar distrito
Route::put('/update/distrito/{id}',array(  
    UbicacionController::class,
    'update.Distrito',
)); 

#