<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comentarios extends Model
{
    use HasFactory;
//Tabla que va a interpretar 
private $table ="comentarios";//nombre exacto de la tabla

//Campos requeridos, para agregar y actualizar. Todos los campos excepto los de llave primaria.
public $fillable = [
    
    'usuario',
    'hotel',
    'comentarios',
    'valoracion',
    'fecha',

      

];

//Campos ocultos
private $hidden = [
    'id' //contraseñas
];
}
