<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Año;

use App\Models\Bitacora;
use  App\Http\Controllers\Admin\BitacoraController;

use App\Http\Controllers\Admin\RolController; 
use App\Http\Controllers\Admin\UserController;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class AñoController extends Controller
{
    public function __construct()
    {    
         $this->middleware('can:admin.años.index')->only('index');
         $this->middleware('can:admin.años.create')->only('create','store');
         $this->middleware('can:admin.años.edit')->only('edit','update');           
         $this->middleware('can:admin.años.destroy')->only('destroy');
     }

    public function index()
    {
        $años = Año::all();
        return view('admin.años.index')->with('años',$años);
    }

 
    public function create()
    {
        return view('admin.años.crear');
    }

  
    public function store(Request $request)
    {
        $años = new Año();

        $años->añofabrica = $request->get('añofabrica');

        $años->save();

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Año';
        $bitacora->descripcion = 'Registró';
        $bitacora->subject_id = $años->id;        
        $bitacora->save();

        return redirect()->route('admin.años.index');
    }

  
    public function show(string $id)
    {
        //
    }

  
    public function edit(string $id)
    {
       $años = Año::find($id);
        return view('admin.años.editar')->with('años',$años);
    }

  
    public function update(Request $request, string $id)
    {
        $años = Año::find($id);

        $años->añofabrica = $request->get('añofabrica');   
        
        $años->save();

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Año';
        $bitacora->descripcion = 'Actualizó';
        $bitacora->subject_id = $años->id;        
        $bitacora->save();

        return redirect()->route('admin.años.index');
    }

 
    public function destroy(string $id)
    {
        $años = Año::find($id);

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Año';
        $bitacora->descripcion = 'Eliminó';
        $bitacora->subject_id = $años->id;        
        $bitacora->save();

        $años->delete();
        return redirect()->route('admin.años.index');
    }
}
