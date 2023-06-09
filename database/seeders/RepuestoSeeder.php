<?php

namespace Database\Seeders;

use App\Models\Repuesto;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class RepuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $repuestos = [
            [
                'id_nombrerepuesto' => 1,
                'descripcion' => 'Motor H20A con caja automática 4x4',
                'precioventa' => 19865.00,
                'stock' => 0,
                'id_categoria' => 1,
                'id_modelo' => 9,
                'id_año' => 2,
                'id_estantes' => 2,
            ],
            [
                'id_nombrerepuesto' => 2,
                'descripcion' => 'Motor 1kz con caja mecánica a diesel',
                'precioventa' => 20184.00,
                'stock' => 0,
                'id_categoria' => 1,
                'id_modelo' => 9,
                'id_año' => 4,
                'id_estantes' => 3,
            ],
            [
                'id_nombrerepuesto' => 3,
                'descripcion' => 'Juego de llantas Yokohama 215/65R16',
                'precioventa' => 2500.00,
                'stock' => 0,
                'id_categoria' => 2,
                'id_modelo' => 9,
                'id_año' => 2,
                'id_estantes' => 1,
            ],
            [
                'id_nombrerepuesto' => 4,
                'descripcion' => 'Juego de llantas DUNLOP 215/55R16',
                'precioventa' => 2500.00,
                'stock' => 0,
                'id_categoria' => 2,
                'id_modelo' => 3,
                'id_año' => 4,
                'id_estantes' => 3,
            ],
            [
                'id_nombrerepuesto' => 5,
                'descripcion' => 'Juego de llantas GOODFYEAR  265/65R17',
                'precioventa' => 5200.00,
                'stock' => 0,
                'id_categoria' => 2,
                'id_modelo' => 1,
                'id_año' => 2,
                'id_estantes' => 3,
            ],
            [
                'id_nombrerepuesto' => 6,
                'descripcion' => 'Jugo de aros de magnesio R17 de 5 pernos',
                'precioventa' => 2500.00,
                'stock' => 0,
                'id_categoria' => 3,
                'id_modelo' => 1,
                'id_año' => 5,
                'id_estantes' => 3,
            ],
            [
                'id_nombrerepuesto' => 6,
                'descripcion' => 'Juego de aros de magnesio R17 de 6 pernos',
                'precioventa' => 5300.00,
                'stock' => 0,
                'id_categoria' => 3,
                'id_modelo' => 11,
                'id_año' => 5,
                'id_estantes' => 3,
            ],
            [
                'id_nombrerepuesto' => 6,
                'descripcion' => 'Juego de aros de magnesio R17 de 6 pernos',
                'precioventa' => 5200.00,
                'stock' => 0,
                'id_categoria' => 3,
                'id_modelo' => 4,
                'id_año' => 3,
                'id_estantes' => 1,
            ],
            [
                'id_nombrerepuesto' => 7,
                'descripcion' => 'Caja automatica con doble 4x4',
                'precioventa' => 7700.00,
                'stock' => 0,
                'id_categoria' => 4,
                'id_modelo' => 1,
                'id_año' => 5,
                'id_estantes' => 1,
            ],
            [
                'id_nombrerepuesto' => 8,
                'descripcion' => 'Caja mecanica simple sin doble',
                'precioventa' => 6000.00,
                'stock' => 0,
                'id_categoria' => 4,
                'id_modelo' => 1,
                'id_año' => 3,
                'id_estantes' => 1,
            ],
            [
                'id_nombrerepuesto' => 8,
                'descripcion' => 'Caja mecanica simple sin doble',
                'precioventa' => 5500.00,
                'stock' => 0,
                'id_categoria' => 4,
                'id_modelo' => 11,
                'id_año' => 5,
                'id_estantes' => 3,
            ],
            [
                'id_nombrerepuesto' => 9,
                'descripcion' => 'Trompa frontal',
                'precioventa' => 10275.00,
                'stock' => 0,
                'id_categoria' => 5,
                'id_modelo' => 2,
                'id_año' => 2,
                'id_estantes' => 2,
            ],
            [
                'id_nombrerepuesto' => 10,
                'descripcion' => 'Radiador de aire de vagoneta',
                'precioventa' => 500.00,
                'stock' => 0,
                'id_categoria' => 6,
                'id_modelo' => 7,
                'id_año' => 1,
                'id_estantes' => 1,
            ],
            [
                'id_nombrerepuesto' => 11,
                'descripcion' => 'Radiador de agua de 3 celdas',
                'precioventa' => 2100.00,
                'stock' => 0,
                'id_categoria' => 6,
                'id_modelo' => 7,
                'id_año' => 1,
                'id_estantes' => 1,
            ],
            [
                'id_nombrerepuesto' => 12,
                'descripcion' => 'Parachoque cromado delantero con alogenos',
                'precioventa' => 1712.00,
                'stock' => 0,
                'id_categoria' => 7,
                'id_modelo' => 10,
                'id_año' => 5,
                'id_estantes' => 1,
            ],
            [
                'id_nombrerepuesto' => 13,
                'descripcion' => 'Faroles ojos de angel',
                'precioventa' => 450.00,
                'stock' => 0,
                'id_categoria' => 8,
                'id_modelo' => 7,
                'id_año' => 5,
                'id_estantes' => 1,
            ],
            [
                'id_nombrerepuesto' => 14,
                'descripcion' => 'Juego de puertas azul marino',
                'precioventa' => 4000.00,
                'stock' => 0,
                'id_categoria' => 9,
                'id_modelo' => 9,
                'id_año' => 2,
                'id_estantes' => 2,
            ],
            [
                'id_nombrerepuesto' => 15,
                'descripcion' => 'Capot blanco',
                'precioventa' => 800.00,
                'stock' => 0,
                'id_categoria' => 10,
                'id_modelo' => 1,
                'id_año' => 2,
                'id_estantes' => 3,
            ],
            [
                'id_nombrerepuesto' => 16,
                'descripcion' => 'Carroceria negro con tapa',
                'precioventa' => 8905.00,
                'stock' => 0,
                'id_categoria' => 11,
                'id_modelo' => 3,
                'id_año' => 5,
                'id_estantes' => 3,
            ],
            [
                'id_nombrerepuesto' => 17,
                'descripcion' => 'Tanque de gasolina de 90 litros',
                'precioventa' => 800.00,
                'stock' => 0,
                'id_categoria' => 12,
                'id_modelo' => 2,
                'id_año' => 2,
                'id_estantes' => 2,
            ],
            [
                'id_nombrerepuesto' => 18,
                'descripcion' => 'Amoriguador en espiral amarillo',
                'precioventa' => 500.00,
                'stock' => 0,
                'id_categoria' => 13,
                'id_modelo' => 1,
                'id_año' => 2,
                'id_estantes' => 2,
            ],
            [
                'id_nombrerepuesto' => 19,
                'descripcion' => 'Corona trasera completa',
                'precioventa' => 4100.00,
                'stock' => 0,
                'id_categoria' => 14,
                'id_modelo' => 11,
                'id_año' => 5,
                'id_estantes' => 3,
            ],
            [
                'id_nombrerepuesto' => 20,
                'descripcion' => 'Chasis completo',
                'precioventa' => 7000.00,
                'stock' => 0,
                'id_categoria' => 15,
                'id_modelo' => 12,
                'id_año' => 3,
                'id_estantes' => 3,
            ],
            [
                'id_nombrerepuesto' => 21,
                'descripcion' => 'Par de guardabarros blanco',
                'precioventa' => 700.00,
                'stock' => 0,
                'id_categoria' => 16,
                'id_modelo' => 9,
                'id_año' => 4,
                'id_estantes' => 1,
            ],
            [
                'id_nombrerepuesto' => 22,
                'descripcion' => 'Volante completo',
                'precioventa' => 1918.00,
                'stock' => 0,
                'id_categoria' => 17,
                'id_modelo' => 2,
                'id_año' => 2,
                'id_estantes' => 2,
            ],
            [
                'id_nombrerepuesto' => 23,
                'descripcion' => 'Cilindro hidraulico de aire',
                'precioventa' => 500.00,
                'stock' => 0,
                'id_categoria' => 18,
                'id_modelo' => 2,
                'id_año' => 3,
                'id_estantes' => 3,
            ],
            [
                'id_nombrerepuesto' => 24,
                'descripcion' => 'Gato hidraulico rojo',
                'precioventa' => 100.00,
                'stock' => 0,
                'id_categoria' => 19,
                'id_modelo' => 8,
                'id_año' => 3,
                'id_estantes' => 2,
            ],
            [
                'id_nombrerepuesto' => 25,
                'descripcion' => 'Guantera completa ploma',
                'precioventa' => 200.00,
                'stock' => 0,
                'id_categoria' => 19,
                'id_modelo' => 10,
                'id_año' => 2,
                'id_estantes' => 2,
            ],
            [
                'id_nombrerepuesto' => 26,
                'descripcion' => 'Par de espejos cromados',
                'precioventa' => 900.00,
                'stock' => 0,
                'id_categoria' => 19,
                'id_modelo' => 11,
                'id_año' => 5,
                'id_estantes' => 1,
            ],
            [
                'id_nombrerepuesto' => 27,
                'descripcion' => 'Radio completa con pantalla tactil',
                'precioventa' => 1100.00,
                'stock' => 0,
                'id_categoria' => 19,
                'id_modelo' => 6,
                'id_año' => 5,
                'id_estantes' => 1,
            ],
        ];

        foreach ($repuestos as $repuesto) {
            Repuesto::create($repuesto);
        } 
    }
}
