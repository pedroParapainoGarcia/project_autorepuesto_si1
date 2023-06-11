<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estante extends Model
{
    use HasFactory;

    public function repuestos(){
        return $this->hasMany(Repuesto::class,'id');
    }
}
