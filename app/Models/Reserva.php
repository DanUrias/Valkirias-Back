<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class create_reserva_table extends Model
{
    use HasFactory;



    //Tabla que va a interpretar 
    private $table ="reserva";//nombre exacto de la tabla

    //Campos requeridos, para agregar y actualizar. Todos los campos excepto los de llave primaria.
    public $fillable = [
            'nombres',
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
