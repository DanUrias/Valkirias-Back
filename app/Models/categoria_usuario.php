<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria_usuario extends Model
{
    use HasFactory;
//Tabla que va a interpretar 
private $table ="categoria_usuarios";//nombre exacto de la tabla

//Campos requeridos, para agregar y actualizar. Todos los campos excepto los de llave primaria.
public $fillable = [

       'nombres',
       

      

];

//Campos ocultos
private $hidden = [
    'id' //contraseñas
];
}
