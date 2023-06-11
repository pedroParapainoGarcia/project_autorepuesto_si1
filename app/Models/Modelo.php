<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;
    protected $fillable =[
        'nombre',        
        'id_marca'
    ];

 

    public function marcas(){
        return $this->belongsTo(Marca::class,'id_marca');
    }


    public function repuestos(){
        return $this->hasMany(Repuesto::class,'id');
    }
}
