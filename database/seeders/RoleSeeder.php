<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'vendedor']);

        Permission::create(['name' => 'admin.home','description'=>'Ver La Vista Principal'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'admin.repuestos.index','description'=>'Ver Listado de Repuesto'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.repuestos.create','description'=>'Crear Repuesto'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.repuestos.edit','description'=>'Editar datos Repuesto'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.repuestos.destroy','description'=>'Eliminar Repuesto'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.usuarios.index','description'=>'Ver Listado de Usarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.usuarios.create','description'=>'Crear Usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.usuarios.edit','description'=>'Editar datos de Usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.usuarios.destroy','description'=>'Eliminar Usuario'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.roles.index','description'=>'Ver Listado de Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.create','description'=>'Crear Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edit','description'=>'Editar datos de Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.destroy','description'=>'Eliminar Rol'])->syncRoles([$role1]);

         

    }
}
