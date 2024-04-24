<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class metodo_pago extends Model
{
    use HasFactory;

 private $table ="metodo_pagos";//nombre exacto de la tabla

 
 public $fillable = [

       'nombre',
       

 ];

 //Campos ocultos
 private $hidden = [
     'id' //contraseñas
 ];
}

