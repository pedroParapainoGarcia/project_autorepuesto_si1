<?php

namespace Database\Seeders;

use App\Models\Nombrerepuesto;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class NombreRepuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $repuestos = [
            'Motor H2OA', 'Motor 1kz', 'Llantas YOKOHAMA', 'Llantas DUNLOP',
            'Llantas GOODFYEAR', 'Aros de Magnesio', 'Caja automatica', 'Caja mecanica',
            'Trompa', 'Radiador de aire', 'Radiador de agua', 'Parachoque cromado',
            'Par de faroles', 'Juego de puertas', 'Capot', 'Carroceria',
            'Tanque de gasolina', 'Amortiguador', 'corona', 'Chasis',
            'Par de guardabarro', 'Manubrio', 'Cilindro de aire', 'Gato', 'Guantera',
            'Par de espejos', 'Radio'
        ];

        foreach ($repuestos as $repuesto) {
            NombreRepuesto::create([
                'nombre' => $repuesto,
            ]);
        }
    }
}
