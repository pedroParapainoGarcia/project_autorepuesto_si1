<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marca;

use App\Models\Bitacora;
use  App\Http\Controllers\Admin\BitacoraController;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;


class MarcaController extends Controller
{
    public function __construct()
    {    
         $this->middleware('can:admin.marcas.index')->only('index');
         $this->middleware('can:admin.marcas.create')->only('create','store');
         $this->middleware('can:admin.marcas.edit')->only('edit','update');           
         $this->middleware('can:admin.marcas.destroy')->only('destroy');
     }

    public function index()
    {
        $marcas = Marca::all();
        return view('admin.marcas.index',compact('marcas'));
    }


    public function create()
    {
        return view('admin.marcas.crear');
    }


    public function store(Request $request)
    {
        $this->validate(request(),[
            'nombre'=>'required',
]);
        $marcas = new Marca();

        $marcas->nombre = $request->get('nombre');
        $marcas->save();

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Marca';
        $bitacora->descripcion = 'Registró';
        $bitacora->subject_id = $marcas->id;        
        $bitacora->save();

       

        return redirect()->route('admin.marcas.index');
;
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $marcas = Marca::find($id);
        return view('admin.marcas.editar')->with('marcas',$marcas);
    }


    public function update(Request $request, string $id)
    {
        $marcas = Marca::find($id);

        $marcas->nombre = $request->get('nombre'); 

        $marcas->save();

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Marca';
        $bitacora->descripcion = 'Actualizó';
        $bitacora->subject_id = $marcas->id;        
        $bitacora->save();
       
        return redirect()->route('admin.marcas.index');
    }


    public function destroy(string $id)
    {
        $marcas = Marca::find($id);

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Marca';
        $bitacora->descripcion = 'Eliminó';
        $bitacora->subject_id = $marcas->id;        
        $bitacora->save();

        $marcas->delete();
        return redirect()->route('admin.marcas.index');
    }
}
