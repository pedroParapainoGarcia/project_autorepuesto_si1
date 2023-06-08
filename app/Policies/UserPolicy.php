<?php

namespace App\Policies;
use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserPolicy
{
    use  HandlesAuthorization;

    public function vistaUserIndex(User $usuario,Role $roles){
               
        $rolePermissions=DB::table("role_has_perrmissions"); 
        if($roles->id ==$rolePermissions->role_id && $rolePermissions->permisision_id==6){
             return true;
        }
            return false;
    }

    public function vistaCrearUser(User $usuario,Role $roles){
               
        $permissions= Permission::all();
        $rolePermissions=DB::table("role_has_perrmissions");

        if($roles->id ==$rolePermissions->role_id && $permissions->name == 'admin.usuarios.create'){
             return true;
        }
            return false;
    }

    public function vistaEditarUser(User $usuario,Role $roles){
        $permissions= Permission::all();
        $rolePermissions=DB::table("role_has_perrmissions");

        if($roles->id ==$rolePermissions->role_id && $permissions->name == 'admin.usuarios.edit'){
             return true;
        }
            return false;
    }

}
