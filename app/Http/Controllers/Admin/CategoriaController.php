<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;

use App\Models\Bitacora;
use  App\Http\Controllers\Admin\BitacoraController;
use App\Http\Controllers\Admin\RolController; 
use App\Http\Controllers\Admin\UserController;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
class CategoriaController extends Controller
{
    public function __construct()
    {    
         $this->middleware('can:admin.categorias.index')->only('index');
         $this->middleware('can:admin.categorias.create')->only('create','store');
         $this->middleware('can:admin.categorias.edit')->only('edit','update');           
         $this->middleware('can:admin.categorias.destroy')->only('destroy');
     }

    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categorias.index')->with('categorias',$categorias);
    }


    public function create()
    {
        return view('admin.categorias.crear');
    }


    public function store(Request $request)
    {
        $categorias = new Categoria();

        $categorias->nombre = $request->get('nombre');

        $categorias->save();

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Categoria';
        $bitacora->descripcion = 'Registró';
        $bitacora->subject_id = $categorias->id;        
        $bitacora->save();

        return redirect()->route('admin.categorias.index');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $categorias = Categoria::find($id);
        return view('admin.categorias.editar')->with('categorias',$categorias);
    }


    public function update(Request $request, string $id)
    {
        $categorias = Categoria::find($id);

        $categorias->nombre = $request->get('nombre');   

        $categorias->save();

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Categoria';
        $bitacora->descripcion = 'Actualizó';
        $bitacora->subject_id = $categorias->id;        
        $bitacora->save();
       
        return redirect()->route('admin.categorias.index');


        

    }


    public function destroy(string $id)
    {
        $categorias = Categoria::find($id);

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Categoria';
        $bitacora->descripcion = 'Eliminó';
        $bitacora->subject_id = $categorias->id;        
        $bitacora->save();

        $categorias->delete();
        return redirect()->route('admin.categorias.index');
    }
}
