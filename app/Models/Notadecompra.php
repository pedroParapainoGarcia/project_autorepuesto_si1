<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notadecompra extends Model
{
    use HasFactory;

    //relacion uno a muchos proveedor-notaDeCompras (inversa)
    public function provedores(){
        return $this->belongsTo(Proveedore::class,'id_proveedor');
    }
    
    //relacion uno a muchos usuario-notaDeCompras (inversa)
    public function usuarios(){
        return $this->belongsTo(User::class,'id_usuario');
    }
}
