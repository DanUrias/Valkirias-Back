<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class municipio extends Model
{
    use HasFactory;
    
    private $table ="municipio";
   
   
    public $fillable = [
   
          'nombres',
          
   
    ];
   
    //Campos ocultos
    private $hidden = [
        'id' //contraseñas
    ];
   }
   
   
