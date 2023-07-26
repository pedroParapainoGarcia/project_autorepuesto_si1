<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notasalida extends Model
{
    use HasFactory;
    protected $fillable = [        
        'fecha',
        'costototal',
        'id_usuario',
        
    ];
  
    //relacion uno a muchos usuario-notaDeSalidas (inversa)
    public function usuarios(){
        return $this->belongsTo(User::class,'id_usuario');
    }

    //relacion muchos a muchos notadesalida-repuestos
    public function repuesto(){
        return $this->belongsToMany(Repuesto::class,'detallesalidas')->withPivot('codigoRepuesto','cantidad','costounitario','subtotal');
    }
}
