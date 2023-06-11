<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modelo;
use App\Models\Marca;

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
        $marcas= Marca::all();   
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
        $model = Modelo::create(request(['nombre','id_marca']));

        $model->save();
        
         return redirect()->route('admin.modelos.index');
      
        // request()->validate(Modelo::$rules);
        // $modelo = Modelo::create($request->all());
        // return redirect()->route('admin.modelos.index');
     
    }

    
    public function show(string $id)
    {
        //
    }

   
    public function edit($id)
    {
        $modelo = Modelo::find($id);
        $marca = Marca::all();        
    
        return view('admin.modelos.editar',compact('modelo','marca'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $this->validate(request(), [
            'nombre' => 'required',
            'id_marca' => 'required'
        ]);
         
    
        $modelo = Modelo::find($id);
        $modelo->nombre = $request->nombre;
        $modelo->id_marca = $request->id_marca;

        $modelo->save();
    
        return redirect()->route('admin.modelos.index');

    }


    public function destroy(string $id)
    {
        Modelo::find($id)->delete();
        return redirect()->route('admin.modelos.index');


    }
}
