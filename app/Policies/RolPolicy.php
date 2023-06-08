<?php

namespace App\Policies;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Auth\Access\HandlesAuthorization;

class RolPolicy
{
    use HandlesAuthorization;

    public function vistaRolIndex(User $usuario,Role $roles){
               
        $rolePermissions=DB::table("role_has_perrmissions"); 
        if($roles->id ==$rolePermissions->role_id && $rolePermissions->permisision_id==10){
             return true;
        }
            return false;
    }

    public function vistaCrearRol(User $usuario,Permission $permissions){
               
        
        if($permissions->name == 'admin.roles.create'){
             return true;
        }
            return false;
    }

    public function vistaEditarRol(User $usuario,Permission $permissions){
               
        if($permissions->name == 'admin.roles.edit'){
             return true;
        }
            return false;
    }

}
