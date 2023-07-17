<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
use App\Models\Año;
use App\Models\Bitacora;
use App\Models\Categoria;
use App\Models\Estante;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Nombrerepuesto;
use App\Models\Repuesto;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

use  App\Http\Controllers\Admin\BitacoraController;
use App\Http\Controllers\Admin\RolController; 
use App\Http\Controllers\Admin\UserController;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RepuestoController extends Controller
{
    public function __construct()
    {
        
        //  $this->middleware('can:admin.repuestos.index')->only('index');
        //  $this->middleware('can:admin.repuestos.create')->only('create','store');
        //  $this->middleware('can:admin.repuestos.edit')->only('edit','update');           
        //  $this->middleware('can:admin.repuestos.destroy')->only('destroy');
    }

    public function index()
    {
        $años = Año::all();
        $categorias = Categoria::all();  
        $estantes = Estante::all();
        $modelos = Modelo::all();
        $nombrerepuestos = Nombrerepuesto::all();
        $repuestos=Repuesto::all();       
        return view('admin.repuestos.index',compact('repuestos','nombrerepuestos','categorias','modelos','años','estantes'));
    }


    public function create()
    {
        $repuesto = new Repuesto();
        $nombrerepuestos = Nombrerepuesto::pluck('nombre','id');
        $categorias = Categoria::pluck('nombre','id');
        $modelos= Modelo::pluck('nombre','id');
        $años= Año::pluck('añofabrica','id');  
        $estantes = Estante::pluck('descripcion','id');   
        return view('admin.repuestos.crear',compact('repuesto','nombrerepuestos','categorias','modelos','años','estantes'));
    
        // $modelo = new Modelo();
        // $marcas= Marca::pluck('nombre','id');   
        // return view('admin.modelos.crear',compact('modelo','marcas'));
    }


    public function store(Request $request)
    {
        $this->validate(request(),[        
            'id_nombrerepuesto'=>'required',
            'descripcion'=>'required',
            'precioventa'=>'required',
            'stock'=>'required',
            'id_categoria'=>'required',
            'id_modelo'=>'required',
            'id_año'=>'required',
            'id_estantes'=>'required'
        ]);

            $repuesto = new Repuesto();

            $repuesto->id_nombrerepuesto = $request->get('id_nombrerepuesto');
            $repuesto->descripcion = $request->get('descripcion');
            $repuesto->precioventa = $request->get('precioventa');
            $repuesto->stock = $request->get('stock');
            $repuesto->id_categoria = $request->get('id_categoria');
            $repuesto->id_modelo = $request->get('id_modelo');
            $repuesto->id_año = $request->get('id_año');
            $repuesto->id_estantes = $request->get('id_estantes');
            $repuesto->save();

            $bitacora = new Bitacora();   
            $id = Auth::id();       
            $bitacora->causer_id = $id ;
            $bitacora->name = Role::find($id)->name;
            $bitacora->long_name = 'Repuestos';
            $bitacora->descripcion = 'Registró';
            $bitacora->subject_id = $repuesto->id;        
            $bitacora->save();
        
         return redirect()->route('admin.repuestos.index');

       
    }


    public function show(string $id)
    {
        //
    }


    public function edit($id)
    {
        $repuesto = Repuesto::find($id);        
        $nombrerepuesto = Nombrerepuesto::pluck('nombre','id');
        $categoria = Categoria::pluck('nombre','id');
        $modelo= Modelo::pluck('nombre','id');
        $año= Año::pluck('añofabrica','id');  
        $estante = Estante::pluck('descripcion','id'); 

        return view('admin.repuestos.editar',compact('repuesto','nombrerepuesto','categoria','modelo','año','estante'));
    }


    public function update(Request $request,$id)
    {
        $this->validate(request(), [
            'id_nombrerepuesto'=>'required',
            'descripcion'=>'required',
            'precioventa'=>'required',
            'stock'=>'required',           
            'id_categoria'=>'required',
            'id_modelo'=>'required',
            'id_año'=>'required',
            'id_estantes'=>'required'
        ]);
            
        $input = $request->all();
        $repuesto = Repuesto::find($id);
        $repuesto->update($input);

        $repuesto->save();

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Repuestos';
        $bitacora->descripcion = 'Actualizó';
        $bitacora->subject_id = $repuesto->id;        
        $bitacora->save();

        
        return redirect()->route('admin.repuestos.index');
    }


    public function destroy($id) 
    {
        $repuesto =Repuesto::find($id);

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Repuestos';
        $bitacora->descripcion = 'Eliminó';
        $bitacora->subject_id = $repuesto->id;        
        $bitacora->save();

        $repuesto->delete();
        return redirect()->route('admin.repuestos.index');
    }

}
