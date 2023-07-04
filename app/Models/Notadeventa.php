<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notadeventa extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_cliente',
        'descripcion',
        'fecha',
        'costototal',
        'notadepago',
        '_token',
    ];
    //relacion uno a muchos proveedor-notaDeVentas (inversa)
    public function clientes(){
        return $this->belongsTo(Cliente::class,'id_cliente');
    }
    
    //relacion uno a muchos usuario-notaDeVentas (inversa)
    public function usuarios(){
        return $this->belongsTo(User::class,'id_usuario');
    }

    //relacion muchos a muchos notadeventa-repuestos
    public function repuestos(){
        return $this->belongsToMany(Repuesto::class,'detalle_ventas')->withPivot('cantidad','subtotal');
    }
}
