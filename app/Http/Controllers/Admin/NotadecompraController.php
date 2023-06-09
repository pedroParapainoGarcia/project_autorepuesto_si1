<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetalleCompra;
use App\Models\Notadecompra;
use App\Models\Proveedore;
use App\Models\Repuesto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotadecompraController extends Controller
{
    public function index(){
        $notadecompras = Notadecompra::all();
        $proveedores = Proveedore::all();  
        return view('admin.notadecompras.index',compact('notadecompras','proveedores'));
    }

    public function create()
    {
        $notadecompra = new Notadecompra();
        $proveedores= Proveedore::pluck('nombre','id');   
        return view('admin.notadecompras.crear',compact('notadecompra','proveedores'));
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
            'nrodoc'=>'required',           
            'id_proveedor'=>'required',
            'costototal'=>'required',
            'fecha'=>'required']);

            $id = Auth::id();
            $nota = new Notadecompra();
            $nota->nro_documento = $request->get('nrodoc');
            $nota->id_proveedor = $request->get('id_proveedor');
            $nota->costototal = $request->get('costototal');
            $nota->fecha = $request->get('fecha');
            $nota->id_usuario = User::find($id)->id;
            $nota->save();

            /*$bitacora = new Bitacora();   
            $id = Auth::id();       
            $bitacora->causer_id = $id ;
            $bitacora->name = Role::find($id)->name;
            $bitacora->long_name = 'Modelos';
            $bitacora->descripcion = 'Registró';
            $bitacora->subject_id = $modelo->id;        
            $bitacora->save();*/
        
         return redirect()->route('admin.notadecompras.index');    
    }

    public function edit(string $id)
    {
        $nota = Notadecompra::find($id);
        $proveedores = Proveedore::pluck('nombre','id');
        return view('admin.notadecompras.editar',compact('nota','proveedores'));
    }

    public function update(Request $request,$id)
    {
        $this->validate(request(),[
            'nro_documento'=>'required',           
            'id_proveedor'=>'required',
            'costototal'=>'required',
            'fecha'=>'required'
        ]);
            
        $input = $request->except('_token');
        $nota = Notadecompra::find($id);
        $nota->update($input);

        /*$bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Modelos';
        $bitacora->descripcion = 'Actualizó';
        $bitacora->subject_id = $modelo->id;        
        $bitacora->save();*/
    
        return redirect()->route('admin.notadecompras.index');

    }

    public function destroy(string $id)
    {
        $nota =Notadecompra::find($id);
        $detalles = DetalleCompra::where('id_notadecompra',$nota->id)->get();
        
        foreach ($detalles as $detalle) {
            $repuesto = Repuesto::find($detalle->id_repuesto);
            $repuesto->stock -= $detalle->cantidad;
            $repuesto->save();
            $detalle->delete();
        }
        /*$bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Modelos';
        $bitacora->descripcion = 'Eliminó';
        $bitacora->subject_id = $modelo->id;        
        $bitacora->save();*/
        $nota->delete();
        return redirect()->route('admin.notadecompras.index');
    }
}
