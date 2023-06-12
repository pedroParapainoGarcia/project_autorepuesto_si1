<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modelo;
use App\Models\Marca;

use App\Models\Bitacora;
use  App\Http\Controllers\Admin\BitacoraController;
use App\Http\Controllers\Admin\RolController; 
use App\Http\Controllers\Admin\UserController;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class ModeloController extends Controller
{

    public function __construct()
    {    
         $this->middleware('can:admin.modelos.index')->only('index');
         $this->middleware('can:admin.modelos.create')->only('create','store');
         $this->middleware('can:admin.modelos.edit')->only('edit','update');           
         $this->middleware('can:admin.modelos.destroy')->only('destroy');
     }
  
    public function index()
    {
        $modelos = Modelo::all();
        $marcas = Marca::all();         
        return view('admin.modelos.index',compact('modelos','marcas'));
    }

  
    public function create()
    {
        $modelo = new Modelo();
        $marcas= Marca::pluck('nombre','id');   
        return view('admin.modelos.crear',compact('modelo','marcas'));
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
            'nombre'=>'required',            
            'id_marca'=>'required']);

            $modelo = new Modelo();

            $modelo->nombre = $request->get('nombre');
            $modelo->id_marca = $request->get('id_marca');
            $modelo->save();

            $bitacora = new Bitacora();   
            $id = Auth::id();       
            $bitacora->causer_id = $id ;
            $bitacora->name = Role::find($id)->name;
            $bitacora->long_name = 'Modelos';
            $bitacora->descripcion = 'Registró';
            $bitacora->subject_id = $modelo->id;        
            $bitacora->save();
        
         return redirect()->route('admin.modelos.index');
   
     
    }

    
    public function show(string $id)
    {
        //
    }

   
    public function edit($id)
    {
        $modelo = Modelo::find($id);        
        $marca= Marca::pluck('nombre','id');
        return view('admin.modelos.editar',compact('modelo','marca'));

    }

    public function update(Request $request,$id)
    {
        $this->validate(request(), [
            'nombre' => 'required',
            'id_marca' => 'required'
        ]);
            
        $input = $request->all();
        $modelo = Modelo::find($id);
        $modelo->update($input);

        $modelo->save();

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Modelos';
        $bitacora->descripcion = 'Actualizó';
        $bitacora->subject_id = $modelo->id;        
        $bitacora->save();
    
        return redirect()->route('admin.modelos.index');

    }


    public function destroy(string $id)
    {
        $modelo =Modelo::find($id);

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Modelos';
        $bitacora->descripcion = 'Eliminó';
        $bitacora->subject_id = $modelo->id;        
        $bitacora->save();

        $modelo->delete();
        return redirect()->route('admin.modelos.index');


    }
}
