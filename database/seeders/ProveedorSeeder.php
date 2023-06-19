<?php

namespace Database\Seeders;

use App\Models\Proveedore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proveedores = [
            [
                'nombre' => 'Rosario Chavez',
                'direccion' => '6to anillo Barrio El Fuerte',
                'telefono' => 77823456,
            ],
            // Agrega más registros aquí si deseas
        ];

        foreach ($proveedores as $proveedor) {
            Proveedore::create([
                'nombre' =>$proveedor['nombre'],
                'direccion' =>$proveedor['direccion'],
                'telefono' =>$proveedor['telefono'],
            ]);
        }
    }
}
