<?php

namespace Database\Seeders;

use App\Models\Estante;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class EstanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estantes = [
            ['capacidad' => 40, 'descripcion' => 'Estante de madera'],
            ['capacidad' => 80, 'descripcion' => 'Estante de fierro'],
            ['capacidad' => 50, 'descripcion' => 'Estante grande de madera'],
            ['capacidad' => 20, 'descripcion' => 'Estante de vitrina'],
            ['capacidad' => 20, 'descripcion' => 'Parte Baja'],
        ];

        foreach ($estantes as $estante) {
            Estante::create([
                'capacidad' => $estante['capacidad'],
                'descripcion' => $estante['descripcion'],
            ]);
        }
    }
}
