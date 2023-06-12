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

 
 //relacion uno a muchos marca-modelo (inversa)
    public function marcas(){
        return $this->belongsTo(Marca::class,'id_marca');
    }

//relacion uno a muchos modelo-repuesto
    public function repuestos(){
        return $this->hasMany(Repuesto::class,'id');
    }
}
