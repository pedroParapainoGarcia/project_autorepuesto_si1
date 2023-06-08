<?php

namespace Database\Seeders;

use App\Models\User;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
          'name' => 'Super Administrador',
          'email' => 'superadmin@gmail.com',
          'password' => bcrypt('12345678')
        ])->assignRole('Admin');

        User::create([
          'name' => 'vendedor1',
          'email' => 'vendedor1@gmail.com',
          'password' => bcrypt('12345678')
        ])->assignRole('vendedor');
      

        
    }
}
