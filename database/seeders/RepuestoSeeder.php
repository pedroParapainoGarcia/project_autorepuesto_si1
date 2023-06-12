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
            // ... Agrega los demás registros según tus necesidades
        ];

        foreach ($repuestos as $repuesto) {
            Repuesto::create($repuesto);
        } 
    }
}
