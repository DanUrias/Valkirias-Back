<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comprobante extends Model
{
    use HasFactory;

    private $table ="comprobantes";
    
    public $fillable = [
   
           'id_usuario',
           'metodo_pago',
           'tipo_comprobante',
           'estado',
   
   
          
   
    ];
   
    private $hidden = [
        'id' 
    ];
   }
   
   
   
   