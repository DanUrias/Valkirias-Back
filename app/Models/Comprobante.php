<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class create_comprobante_table extends Model
{
    use HasFactory;

     //Tabla que va a interpretar 
 private $table ="comprobante";//nombre exacto de la tabla

 //Campos requeridos, para agregar y actualizar. Todos los campos excepto los de llave primaria.
 public $fillable = [

        'id_usuario',
        'metodo_pago',
        'tipo_comprobante',
        'estado',


       

 ];

 //Campos ocultos
 private $hidden = [
     'id' //contraseñas
 ];
}



