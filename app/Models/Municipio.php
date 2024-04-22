<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    //Tabla que va a interpretar 
    public $table ="municipio";//nombre exacto de la tabla
   
    //Campos requeridos, para agregar y actualizar. Todos los campos excepto los de llave primaria.
    public $fillable = [
      'departamento_id',
          'nombre',
    ];
   
    //Campos ocultos
    public $hidden = [
    ];
   }
   
   