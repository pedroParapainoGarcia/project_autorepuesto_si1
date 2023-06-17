<?php

namespace Database\Seeders;

use App\Models\Categoria;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            'Motor', 'LLantas', 'Aros', 'Cajas', 'Trompas',
            'Radiadores', 'Parachoques', 'Faroles', 'Puertas',
            'Capot', 'Carrocerias', 'Tanques', 'Amortiguadores',
            'Coronas', 'Chasis', 'GuardaBarros', 'Manubrios',
            'Cilindros', 'Accesorios'
        ];

        foreach ($categorias as $categoria) {
            Categoria::create([
                'nombre' => $categoria,
            ]);
        }
    }
}
