<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    //Tabla que va a interpretar 
    private $table ="hotel";//nombre exacto de la tabla
   
    //Campos requeridos, para agregar y actualizar. Todos los campos excepto los de llave primaria.
    public $fillable = [

        'municipio_id',
        'habitaciones_id',
        'fotos',
        'nombre',
        'contacto',
        'email',
        'contraseña',
        'whatsApp',
        'direccion',
        'encargado'   

   
    ];
   
    //Campos ocultos
    private $hidden = [
        'id' //contraseñas
    ];
   }
   
   


        