<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class create_factura_table extends Model
{
    use HasFactory;
 //Tabla que va a interpretar 
 private $table ="";//nombre exacto de la tabla

 //Campos requeridos, para agregar y actualizar. Todos los campos excepto los de llave primaria.
 public $fillable = [

        'nombres',
        'fecha_pago',
        'N°_comprobante',
        'N°_factura',

       

 ];

 //Campos ocultos
 private $hidden = [
     'id' //contraseñas
 ];
}

