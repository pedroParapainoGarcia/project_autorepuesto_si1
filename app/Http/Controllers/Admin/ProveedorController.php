<?php

namespace App\Http\Controllers\Admin;

use App\Models\Proveedore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Bitacora;
use  App\Http\Controllers\Admin\BitacoraController;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedore::all();
        return view('admin.proveedores.index',compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.proveedores.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'nombre'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
            
        ]); 



        
        $proveedor= new Proveedore();
        $proveedor->nombre = $request->get('nombre');
        $proveedor->direccion = $request->get('direccion');
        $proveedor->telefono = $request->get('telefono');
        $proveedor->save();

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Proveedores';
        $bitacora->descripcion = 'Registró';
        $bitacora->subject_id = $proveedor->id;        
        $bitacora->save();

        return redirect()->route('admin.proveedores.index');  


    }

  
    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $proveedor = Proveedore::find($id);     
    
        return view('admin.proveedores.editar',compact('proveedor'));
    }


    public function update(Request $request,$id)
    {
        $proveedor = Proveedore::find($id);

        $proveedor->nombre = $request->get('nombre'); 
        $proveedor->direccion = $request->get('direccion'); 
        $proveedor->telefono = $request->get('telefono'); 

        $proveedor->save();
        

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Provedores';
        $bitacora->descripcion = 'Actualizó';
        $bitacora->subject_id = $proveedor->id;        
        $bitacora->save();
    
        return redirect()->route('admin.proveedores.index');

    }


    public function destroy(string $id)
    {
        $proveedor = Proveedore::find($id);

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Provedores';
        $bitacora->descripcion = 'Eliminó';
        $bitacora->subject_id = $proveedor->id;        
        $bitacora->save();

        $proveedor->delete();
        return redirect()->route('admin.proveedores.index');
    }
}
