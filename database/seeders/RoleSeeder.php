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

        Permission::create(['name' => 'admin.nombrerepuestos.index','description'=>'Ver Listado de Repuesto'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.nombrerepuestos.create','description'=>'Crear Repuesto'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.nombrerepuestos.edit','description'=>'Editar datos Repuesto'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.nombrerepuestos.destroy','description'=>'Eliminar Repuesto'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.usuarios.index','description'=>'Ver Listado de Usarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.usuarios.create','description'=>'Crear Usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.usuarios.edit','description'=>'Editar datos de Usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.usuarios.destroy','description'=>'Eliminar Usuario'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.roles.index','description'=>'Ver Listado de Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.create','description'=>'Crear Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edit','description'=>'Editar datos de Rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.destroy','description'=>'Eliminar Rol'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.años.index','description'=>'Ver Listado de año'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.años.create','description'=>'Crear año'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.años.edit','description'=>'Editar datos de año'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.años.destroy','description'=>'Eliminar año'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.estantes.index','description'=>'Ver Listado de estante'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.estantes.create','description'=>'Crear estante'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.estantes.edit','description'=>'Editar datos de estante'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.estantes.destroy','description'=>'Eliminar estante'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.categorias.index','description'=>'Ver Listado de categoria'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categorias.create','description'=>'Crear categoria'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categorias.edit','description'=>'Editar datos de categoria'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categorias.destroy','description'=>'Eliminar categoria'])->syncRoles([$role1]);
/*
        Permission::create(['name' => 'admin.estantes.index','description'=>'Ver Listado de estante'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.estantes.create','description'=>'Crear estante'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.estantes.edit','description'=>'Editar datos de estante'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.estantes.destroy','description'=>'Eliminar estante'])->syncRoles([$role1]);
*/



       
         

    }
}
