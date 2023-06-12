<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nombrerepuesto;

use App\Models\Bitacora;
use  App\Http\Controllers\Admin\BitacoraController;
use App\Http\Controllers\Admin\RolController; 
use App\Http\Controllers\Admin\UserController;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
class NombrerepuestoController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.nombrerepuestos.index')->only('index');
        $this->middleware('can:admin.nombrerepuestos.create')->only('create','store');
        $this->middleware('can:admin.nombrerepuestos.edit')->only('edit','update');           
        $this->middleware('can:admin.nombrerepuestos.destroy')->only('destroy');      
    }
 
    public function index()
    {
        $nombrerepuestos = Nombrerepuesto::all();
        return view('admin.nombrerepuestos.index')->with('nombrerepuestos',$nombrerepuestos);
    }

 
    public function create()
    {
        return view('admin.nombrerepuestos.crear');
    }


    public function store(Request $request)
    {
        $nombrerepuestos = new Nombrerepuesto();

        $nombrerepuestos->nombre = $request->get('nombre');

        $nombrerepuestos->save();

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Nombre Repuestos';
        $bitacora->descripcion = 'Registró';
        $bitacora->subject_id = $nombrerepuestos->id;        
        $bitacora->save();

        return redirect()->route('admin.nombrerepuestos.index');
       
    }

  
    public function show(string $id)
    {
        //
    }

 
    public function edit(string $id)
    {
        $nombrerepuestos = Nombrerepuesto::find($id);
        return view('admin.nombrerepuestos.editar')->with('nombrerepuestos',$nombrerepuestos);
    }


    public function update(Request $request, string $id)
    {
        $nombrerepuestos = Nombrerepuesto::find($id);

        $nombrerepuestos->nombre = $request->get('nombre');   

        $nombrerepuestos->save();

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Nombre Repuestos';
        $bitacora->descripcion = 'Actualizó';
        $bitacora->subject_id = $nombrerepuestos->id;        
        $bitacora->save();
       
        return redirect()->route('admin.nombrerepuestos.index');
       
    }

  
    public function destroy(string $id)
    {
        $nombrerepuestos = Nombrerepuesto::find($id);

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Nombre Repuestos';
        $bitacora->descripcion = 'Eliminó';
        $bitacora->subject_id = $nombrerepuestos->id;        
        $bitacora->save();

        $nombrerepuestos->delete();
        return redirect()->route('admin.nombrerepuestos.index');
    }
}
