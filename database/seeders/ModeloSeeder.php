<?php

namespace Database\Seeders;

use App\Models\Modelo;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ModeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modelos = [
            ['id_marca' => 1, 'nombre' => 'Hilux'],
            ['id_marca' => 1, 'nombre' => 'Land Cruiser'],
            ['id_marca' => 1, 'nombre' => 'Tundra'],
            ['id_marca' => 1, 'nombre' => 'Prado'],
            ['id_marca' => 1, 'nombre' => 'Runner'],
            ['id_marca' => 2, 'nombre' => 'Navara'],
            ['id_marca' => 2, 'nombre' => 'Terrano'],
            ['id_marca' => 2, 'nombre' => 'nissan'],
            ['id_marca' => 3, 'nombre' => 'Escudo'],
            ['id_marca' => 4, 'nombre' => 'Ranger'],
            ['id_marca' => 5, 'nombre' => 'Pajero'],
            ['id_marca' => 5, 'nombre' => 'Montero'],
        ];

        foreach ($modelos as $modelo) {
            Modelo::create([
                'id_marca' => $modelo['id_marca'],
                'nombre' => $modelo['nombre'],
            ]);
        }
    }
}
