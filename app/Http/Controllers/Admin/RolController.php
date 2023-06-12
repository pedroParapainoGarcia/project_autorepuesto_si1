<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

use App\Models\Bitacora;
use  App\Http\Controllers\Admin\BitacoraController;
use Illuminate\Support\Facades\Auth;
class RolController extends Controller
{
    public function __construct()
    {
        
         $this->middleware('can:admin.roles.index')->only('index');
         $this->middleware('can:admin.roles.create')->only('create','store');
         $this->middleware('can:admin.roles.edit')->only('edit','update');           
         $this->middleware('can:admin.roles.destroy')->only('destroy');
     }
    

    public function index()
    {
        $roles= Role::all();

        $this->authorize('vistaRolIndex',$roles);
        return view('admin.roles.index',compact('roles'));
    }


    public function create()
    {
        $permissions= Permission::all();
        
        $this->authorize('vistaCrearRol',$permissions);

        return view('admin.roles.crear',compact('permissions'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:roles,name',
            'permission' => 'required',
        ]); 
        
        // $role=Role::create($request->all());
        // $role->permissions()->sync($request->permissions);
        // return redirect()->route('admin.roles.index',$role);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Roles';
        $bitacora->descripcion = 'Registró';
        $bitacora->subject_id = $role->id;        
        $bitacora->save();

    
        return redirect()->route('admin.roles.index');

    }

    public function edit($id)
    {
        
        // $permissions= Permission::all();
       
        // $this->authorize('vistaEditarRol',$permissions);

        // return view('admin.roles.editar',compact('role','permissions'));
        
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
    
        return view('admin.roles.editar',compact('role','permission','rolePermissions'));
    
    
    }


    public function update(Request $request,$id)
    {
        // $request->validate([
        //     'name'=>'required'
        // ]); 
        // $role->update($request->all());
        // $role->permissions()->sync($request->permissions);
        // return redirect()->route('admin.roles.index',$role);

        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        $role->syncPermissions($request->input('permission'));

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Roles';
        $bitacora->descripcion = 'Actualizó';
        $bitacora->subject_id = $role->id;        
        $bitacora->save();
    
        return redirect()->route('admin.roles.index');  

    }


    public function destroy($id)
    {
        $rol =Role::find($id);
        // DB::table("roles")->where('id',$id)->delete();

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Roles';
        $bitacora->descripcion = 'Eliminó';
        $bitacora->subject_id = $rol->id;        
        $bitacora->save();

        $rol->delete();
        return redirect()->route('admin.roles.index'); 
    }
}
