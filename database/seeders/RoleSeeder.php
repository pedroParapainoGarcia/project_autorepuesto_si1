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

        Permission::create(['name' => 'admin.modelos.index','description'=>'Ver Listado de modelo'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.modelos.create','description'=>'Crear modelo'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.modelos.edit','description'=>'Editar datos de modelo'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.modelos.destroy','description'=>'Eliminar modelo'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.marcas.index','description'=>'Ver Listado de marca'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.marcas.create','description'=>'Crear marca'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.marcas.edit','description'=>'Editar datos de marca'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.marcas.destroy','description'=>'Eliminar marca'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.repuestos.index','description'=>'Ver Listado de repuesto'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.repuestos.create','description'=>'Crear repuesto'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.repuestos.edit','description'=>'Editar datos de repuesto'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.repuestos.destroy','description'=>'Eliminar repuesto'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.bitacoras.index','description'=>'Ver Bitacora'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.proveedores.index','description'=>'Ver Listado de Proveedores'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.proveedores.create','description'=>'Crear Proveedor'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.proveedores.edit','description'=>'Editar datos de Proveedor'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.proveedores.destroy','description'=>'Eliminar proveedor'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.clientes.index','description'=>'Ver Listado de clientes'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.clientes.create','description'=>'Crear cliente'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.clientes.edit','description'=>'Editar datos de cliente'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.clientes.destroy','description'=>'Eliminar cliente'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.notadecompras.index','description'=>'Ver Listado de Nota de compras'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.notadecompras.create','description'=>'Crear Nota de compra'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.notadecompras.edit','description'=>'Editar Nota de compra'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.notadecompras.destroy','description'=>'Eliminar Nota de compra'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.notadeventas.index','description'=>'Ver Listado de Nota de Ventas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.notadeventas.create','description'=>'Crear Nota de Venta'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.notadeventas.edit','description'=>'Editar Nota de Venta'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.notadeventas.destroy','description'=>'Eliminar Nota de Venta'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.notasalidas.index','description'=>'Ver Listado de Nota de Salidas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.notasalidas.create','description'=>'Crear Nota de Salida'])->syncRoles([$role1]);
       




       
         

    }
}
