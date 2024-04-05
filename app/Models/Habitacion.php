<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{

    use HasFactory;
    //Tabla que va a interpretar 
    private $table ="habitaciones";//nombre exacto de la tabla
   
    //Campos requeridos, para agregar y actualizar. Todos los campos excepto los de llave primaria.
    public $fillable = [

        'tipo_habitaciones_id',
        'foto_id',
        'no_habitaciones'

   
    ];
   
    //Campos ocultos
    private $hidden = [
        'id' //contraseñas
    ];
   }
   
   


        