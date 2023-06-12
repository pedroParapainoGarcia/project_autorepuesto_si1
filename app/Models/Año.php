<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Año extends Model
{
    use HasFactory;

    //relacion uno a muchos años-repuestos
    public function repuestos(){
        return $this->hasMany(Repuesto::class,'id');
    }
}
