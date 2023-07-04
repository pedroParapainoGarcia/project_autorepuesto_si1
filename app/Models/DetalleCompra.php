<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;
    protected $table = 'detalle_compras';

    // Relación muchos a uno: DetalleCompra -> Repuesto
    public function repuesto()
    {
        return $this->belongsTo(Repuesto::class, 'id_repuesto');
    }

    // Relación muchos a uno: DetalleCompra -> Notadecompra
    public function notadecompra()
    {
        return $this->belongsTo(Notadecompra::class, 'id_notadecompra');
    }
}
