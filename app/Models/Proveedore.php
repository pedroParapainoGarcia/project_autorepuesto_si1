<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedore extends Model
{
    use HasFactory;
    protected $hidden = [
        'nombre',
        'direccion',
        'telefono' 
         
    ];

    
    //relacion uno a muchos proveedor-notaDeCompras
    public function notadecompras(){
        return $this->hasMany(Notadecompra::class,'id');
    }

}
