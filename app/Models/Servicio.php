<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
 
    use HasFactory;



    //Tabla que va a interpretar 
    private $table ="servicios";//nombre exacto de la tabla
    
    //Campos requeridos, para agregar y actualizar. Todos los campos excepto los de llave primaria.
    public $fillable = [
        'Comida',
        'Limpieza',
        'Desinfeccion'
    ];
    
    //Campos ocultos
    private $hidden = [
        'id' //contraseñas
    ];
    }
    