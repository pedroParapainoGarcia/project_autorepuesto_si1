<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repuesto extends Model
{
    use HasFactory;
    
    public function nombrerepuesto(){
        return $this->belongsTo(Marca::class,'id_nombrerepuesto');
    }

    public function categorias(){
        return $this->belongsTo(Marca::class,'id_categoria');
    }

    public function modelos(){
        return $this->belongsTo(Marca::class,'id_modelo');
    }

    public function años(){
        return $this->belongsTo(Marca::class,'id_año');
    }

    public function estantes(){
        return $this->belongsTo(Marca::class,'id_estantes');
    }
    
}
