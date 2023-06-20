<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    $this->call(RoleSeeder::class);
    $this->call(UserSeeder::class);
    $this->call(AñoSeeder::class);
    $this->call(MarcaSeeder::class);
    $this->call(CategoriaSeeder::class);
    $this->call(NombreRepuestoSeeder::class);
    $this->call(EstanteSeeder::class);
    $this->call(ModeloSeeder::class);
    $this->call(RepuestoSeeder::class);
    $this->call(ProveedorSeeder::class);
    }
}
