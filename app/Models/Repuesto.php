<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repuesto extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_nombrerepuesto',
        'descripcion',
        'precioventa',
        'stock',
        'id_categoria',
        'id_modelo',
        'id_año',
        'id_estantes',
    ];
    
    //relacion uno a muchos nombrerepuestos-repuestos (inversa)
    public function nombrerepuesto(){
        return $this->belongsTo(Nombrerepuesto::class,'id_nombrerepuesto');
    }

    //relacion uno a muchos categorias-repuestos (inversa)
    public function categorias(){
        return $this->belongsTo(Categoria::class,'id_categoria');
    }

    //relacion uno a muchos modelos-repuestos (inversa)
    public function modelos(){
        return $this->belongsTo(Modelo::class,'id_modelo');
    }

    //relacion uno a muchos años-repuestos (inversa)
    public function años(){
        return $this->belongsTo(Año::class,'id_año');
    }

    //relacion uno a muchos estantes-repuestos (inversa)
    public function estantes(){
        return $this->belongsTo(Estante::class,'id_estantes');
    }
       



    //relacion muchos a muchos repuestos-notadecompras
    public function notadecompras(){
        return $this->belongsToMany(Notadecompra::class,'detalle_compras')->withPivot('codigo','cantidad','costounitario');
    }

    //relacion muchos a muchos repuestos-notadeventas
    public function notadeventas(){
        return $this->belongsToMany(Notadeventa::class,'detalle_ventas')->withPivot('cantidad','subtotal');
    }

        //relacion muchos a muchos repuestos-notadeventas
        public function notasalidas(){
            return $this->belongsToMany(Notasalida::class,'detallesalidas')->withPivot('codigoRepuesto','cantidad','costounitario','subtotal');
        }
        
    
}
