<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;
    protected $table = 'detalle_ventas';

    

    // Relación muchos a uno: DetalleVenta -> Repuesto
    public function repuesto()
    {
        return $this->belongsTo(Repuesto::class, 'id_repuesto');
    }

    // Relación muchos a uno: DetalleVenta -> Notadeventa
    public function notadeventa()
    {
        return $this->belongsTo(Notadecompra::class, 'id_notadeventa');
    }
}
