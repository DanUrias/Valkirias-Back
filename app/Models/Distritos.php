<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distritos extends Model
{
    use HasFactory;
 //Tabla que va a interpretar 
 private $table ="distritos";//nombre exacto de la tabla

 //Campos requeridos, para agregar y actualizar. Todos los campos excepto los de llave primaria.
 public $fillable = [

        'nombres',
        

       

 ];

 //Campos ocultos
 private $hidden = [
     'id' //contraseñas
 ];
}