<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estante;

use App\Models\Bitacora;
use  App\Http\Controllers\Admin\BitacoraController;
use App\Http\Controllers\Admin\RolController; 
use App\Http\Controllers\Admin\UserController;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
class EstanteController extends Controller
{
    public function __construct()
    {    
         $this->middleware('can:admin.estantes.index')->only('index');
         $this->middleware('can:admin.estantes.create')->only('create','store');
         $this->middleware('can:admin.estantes.edit')->only('edit','update');           
         $this->middleware('can:admin.estantes.destroy')->only('destroy');
     }

    public function index()
    {
        $estantes = Estante::all();
        return view('admin.estantes.index')->with('estantes',$estantes);
    }

 
    public function create()
    {
        return view('admin.estantes.crear');
    }

    public function store(Request $request)
    {
        $estantes = new Estante();

        $estantes->descripcion = $request->get('descripcion');
        $estantes->capacidad = $request->get('capacidad');

        $estantes->save();

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Estantes';
        $bitacora->descripcion = 'Registró';
        $bitacora->subject_id = $estantes->id;        
        $bitacora->save();


        return redirect()->route('admin.estantes.index');


    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $estantes = Estante::find($id);
        return view('admin.estantes.editar')->with('estantes',$estantes);
    }


    public function update(Request $request, string $id)
    {
        $estantes = Estante::find($id);  

        $estantes->descripcion = $request->get('descripcion');
        $estantes->capacidad = $request->get('capacidad');

        $estantes->save();

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Estantes';
        $bitacora->descripcion = 'Actualizó';
        $bitacora->subject_id = $estantes->id;        
        $bitacora->save();
       
        return redirect()->route('admin.estantes.index');


    }


    public function destroy(string $id)
    {
        $estantes = Estante::find($id);

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Estantes';
        $bitacora->descripcion = 'Eliminó';
        $bitacora->subject_id = $estantes->id;        
        $bitacora->save();

        $estantes->delete();
        return redirect()->route('admin.estantes.index');
    }
}
