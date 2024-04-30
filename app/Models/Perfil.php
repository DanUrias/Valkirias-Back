<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDelete;

class perfil extends Model
{
    use HasFactory;
  //Tabla que va a interpretar 
  protected $table ="perfil";//nombre exacto de la tabla

  //Campos requeridos, para agregar y actualizar. Todos los campos excepto los de llave primaria.
  public $fillable = [

        'nombres',
        'apellidos',
        'correo electronico',
        #'dui',
        'usuario',
        'fecha_nacimiento',
        'clave',

  ];

  //Campos ocultos
  protected  $hidden = [
      'id' //contraseñas
  ];
}
