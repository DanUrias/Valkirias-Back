<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


#Importando controladores 

use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\PerfilController;



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






//Ruta para listar Departamentos
Route::get("/index-departamento",array(
    UbicacionController::class,
    'indexDepartamento',
));

//Ruta para listar Municipios
Route::get("/index-municipio",array(
    UbicacionController::class,
    'indexMunicipio',
));

//Rutas para listar un departamento o municipio por nombre
Route::get("/show-departamento/{nombre}",array(
    UbicacionController::class,
    'showDepartamento',
));
Route::get("/show-municipio/{nombre}",array(
    UbicacionController::class,
    'showMunicipio',
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




#RUTAS PERFIL 

#Ruta POST
Route::post('/perfil/store', array(

    PerfilController::class,
    'store'
))->name('perfil.store');

# http://localhost:8000/api/perfil/store



# Ruta Get

# Listar todos los clientes
Route::get('/perfil/index', array(
    PerfilController::class,
    'index'
))->name('perfil.index');

# http://localhost:8000/api/perfil/index


# Ruta Get

# Listar un cliente en especifico

Route::get('perfil/show/{id}', array( 
    PerfilController::class,
    'show'
))->name('perfil.show');

#http://localhost:8000/api/perfil/show/2

#Ruta PUT

Route::put('/perfil/update/{id}', array(
    PerfilController::class,
    'update'
))->name('perfil.update');

#http://localhost:8000/api/perfil/update/2

#Ruta Delete 

Route::delete('/perfil/destroy/{id}', array(
    PerfilController::class,
    'destroy'
))->name('perfil.delete');

#http://localhost:8000/api/perfil/delete/1

#Ruta de restaurar 
Route::put('/perfil/restore/{id}', array(
    PerfilController::class,
    'restore'
))->name('perfil.restore');

#http://localhost:8000/api/perfil/restore/1




