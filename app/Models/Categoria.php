<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    //relacion uno a muchos categoria-repuestos
    public function repuestos(){
        return $this->hasMany(Repuesto::class,'id');
    }
}
