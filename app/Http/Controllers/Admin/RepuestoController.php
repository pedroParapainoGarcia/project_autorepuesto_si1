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

class RepuestoController extends Controller
{

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
        $nombrerepuesto = Nombrerepuesto::pluck('nombre','id');
        $categoria = Categoria::pluck('nombre','id');
        $modelo= Modelo::pluck('nombre','id');
        $año= Año::pluck('añofabrica','id');  
        $estante = Estante::pluck('descripcion','id');   
        return view('admin.repuestos.crear',compact('repuesto','nombrerepuesto','categoria','modelo','año','estante'));
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


    public function update(Request $request, string $id)
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
    
        return redirect()->route('admin.repuestos.index');
    }


    public function destroy($id) 
    {
        Repuesto::find($id)->delete();
        return redirect()->route('admin.repuestos.index');
    }
}
