<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\Cliente;
use App\Models\DetalleVenta;
use App\Models\Notadeventa;
use App\Models\Repuesto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class NotadeventaController extends Controller
{
    //
    public function index()
    {
        $notadeventas = Notadeventa::all();
        $clientes = Cliente::all();  
        return view('admin.notadeventas.index', compact('notadeventas', 'clientes'));
    }


    public function create()
    {
        $notadeventa = new Notadeventa();
        $clientes = Cliente::all();   
        return view('admin.notadeventas.crear', compact('notadeventa', 'clientes'));
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
            'id_cliente'=>'required',           
            'descripcion'=>'required',
            'fecha'=>'required',
            'costototal'=>'required',
            'notadepago' => 'nullable|boolean']);

            $id = Auth::id();
            $nota = new Notadeventa();
            $nota->id_cliente = $request->get('id_cliente');
            $nota->descripcion = $request->get('descripcion');
            $nota->fecha = $request->get('fecha');
            $nota->costototal = $request->get('costototal');
            $nota->id_usuario = User::find($id)->id;
            $nota->notadepago = $request->get('notadepago') ? 1 : 0;
            $nota->save();

            $bitacora = new Bitacora();       
            $bitacora->causer_id = $id ;
            $bitacora->name = Role::find($id)->name;
            $bitacora->long_name = 'Nota de Ventas';
            $bitacora->descripcion = 'Registró una venta';
            $bitacora->subject_id = $nota->id;        
            $bitacora->save();
        
         return redirect()->route('admin.notadeventas.index');    
    }

    public function edit(string $id)
    {
        $nota = Notadeventa::find($id);
        $clientes = Cliente::all()->mapWithKeys(function ($cliente) {
            return [
                $cliente->id => $cliente->Nombre . ' - ' . $cliente->apellido_paterno . ' ' . $cliente->apellido_materno
            ];
        });
        return view('admin.notadeventas.editar', compact('nota', 'clientes'));
    }

    public function update(Request $request,$id)
    {
        $this->validate(request(),[
            'id_cliente'=>'required',           
            'descripcion'=>'required',
            'fecha'=>'required',
            'costototal'=>'required',
            'notadepago' => 'nullable|boolean'
        ]);
            
        $input = $request->except('_token');
        $input['notadepago'] = $request->has('notadepago') ? 1 : 0;
        $nota = Notadeventa::find($id);
        $nota->update($input);

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Notadeventas';
        $bitacora->descripcion = 'Actualizó';
        $bitacora->subject_id = $nota->id;        
        $bitacora->save();
    
        return redirect()->route('admin.notadeventas.index');

    }

    public function destroy(string $id)
    {
        $nota =Notadeventa::find($id);
        $detalles = DetalleVenta::where('id_notadecompra',$nota->id)->get();
        
        foreach ($detalles as $detalle) {
            $repuesto = Repuesto::find($detalle->id_repuesto);
            $repuesto->stock += $detalle->cantidad;
            $repuesto->save();
            $detalle->delete();
        }
        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Nota de Ventas';
        $bitacora->descripcion = 'Eliminó';
        $bitacora->subject_id = $nota->id;        
        $bitacora->save();
        $nota->delete();
        return redirect()->route('admin.notadeventas.index');
    }
}
