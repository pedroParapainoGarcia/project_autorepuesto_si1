<?php

namespace Database\Seeders;

use App\Models\Año;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class AñoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $años = ['1991', '1993', '1996', '1997', '1998'];

        foreach ($años as $año) {
            Año::create([
                'añofabrica' => $año,
            ]);
        }
        /*Año::create([
            'añofabrica' => '1991',
        ]);

        Año::create([
            'añofabrica' => '1993',
        ]);

        Año::create([
            'añofabrica' => '1996',
        ]);

        Año::create([
            'añofabrica' => '1997',
        ]);

        Año::create([
            'añofabrica' => '1998',
        ]);*/
    }
}
