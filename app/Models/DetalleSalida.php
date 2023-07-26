<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallesalida extends Model
{
    use HasFactory;
    protected $table = 'detallesalidas';

    // Relación muchos a uno: Detallesalida -> Repuesto
    public function repuesto()
    {
        return $this->belongsTo(Repuesto::class, 'id_repuesto');
    }

    // Relación muchos a uno: Detallesalida -> Notasalida
    public function notasalida()
    {
        return $this->belongsTo(Notasalida::class, 'id_notasalida');
    }

}
