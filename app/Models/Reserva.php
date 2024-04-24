<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserva extends Model
{
    use HasFactory;



    //Tabla que va a interpretar 
    private $table ="reservas";//nombre exacto de la tabla

    //Campos requeridos, para agregar y actualizar. Todos los campos excepto los de llave primaria.
    public $fillable = [
            'nombres',
            'apellidos',
           'id_usuario',
            'id_hotel',
            'factura',
            'fecha_reserva',
            'check in',
            'check out',
            'estadoReserva',
    ];

    //Campos ocultos
    private $hidden = [
        'id' //contraseñas
    ];
}