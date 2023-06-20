<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notadecompra extends Model
{
    use HasFactory;

    protected $fillable = [
        'nro_documento',
        'id_proveedor',
        'costototal',
        'fecha',
        '_token',
    ];

    //relacion uno a muchos proveedor-notaDeCompras (inversa)
    public function provedores(){
        return $this->belongsTo(Proveedore::class,'id_proveedor');
    }
    
    //relacion uno a muchos usuario-notaDeCompras (inversa)
    public function usuarios(){
        return $this->belongsTo(User::class,'id_usuario');
    }

    //relacion muchos a muchos notadecompra-repuestos
    public function repuestos(){
        return $this->belongsToMany(Repuesto::class,'detalle_compras')->withPivot('cantidad','costounitario');
    }
}
