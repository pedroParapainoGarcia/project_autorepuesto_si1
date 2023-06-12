<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

use App\Models\Bitacora;
use  App\Http\Controllers\Admin\BitacoraController;


class UserController extends Controller
{
     public function _construct()
     {
     
             $this->middleware('can:admin.usuarios.index')->only('index');
             $this->middleware('can:admin.usuarios.create')->only('create','store');
             $this->middleware('can:admin.usuarios.edit')->only('edit','update');           
             $this->middleware('can:admin.usuarios.destroy')->only('destroy');      
    
    
    }

 
    public function index()
    {
        $usuarios = User::all();
        $roles = Role::all();  
        $this->authorize('vistaUserIndex',$roles);     
        return view('admin.usuarios.index',compact('usuarios'));
    }

 
    public function create()
    {
        $roles=Role::pluck('name','name')->all();
        $this->authorize('vistaCrearUser',$roles); 
        return view('admin.usuarios.crear',compact('roles'));
    }

  
    public function store(Request $request)
    {
         $this->validate(request(),[
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|same:confirm-password',
            'roles'=>'required',
        ]); 
        
        $input =$request->all();
        $input['password']=Hash::make($input['password']);

        $user=User::create($input);
        $user->assignRole($request->input('roles'));

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Usuarios';
        $bitacora->descripcion = 'Registró';
        $bitacora->subject_id = $user->id;        
        $bitacora->save();

        return redirect()->route('admin.usuarios.index',$user);     
        
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('admin.usuarios.editar',compact('user','roles','userRole'));
    }

   
    public function update(Request $request, $id)
    
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Usuarios';
        $bitacora->descripcion = 'Actualizó';
        $bitacora->subject_id = $user->id;        
        $bitacora->save();
    
        return redirect()->route('admin.usuarios.index');
    }

   
    public function destroy($id)
    {
        $usuario =User::find($id);

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Usuarios';
        $bitacora->descripcion = 'Eliminó';
        $bitacora->subject_id = $usuario->id;        
        $bitacora->save();

        $usuario->delete();
         return redirect()->route('admin.usuarios.index');

         
    }
}
