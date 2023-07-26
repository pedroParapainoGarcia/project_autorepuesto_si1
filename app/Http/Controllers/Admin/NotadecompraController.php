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
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;



class NotadecompraController extends Controller
{
    public function index(){
        $notadecompras = Notadecompra::all();
        $proveedores = Proveedore::all();  
        $fechaActual=Carbon::now();
        return view('admin.notadecompras.index',compact('notadecompras','proveedores','fechaActual'));
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
            'id_proveedor'=>'required']);

            $id = Auth::id();
            $nota = new Notadecompra();
            $nota->nro_documento = $request->get('nrodoc');
            $nota->id_proveedor = $request->get('id_proveedor');
            $nota->costototal =0.00;
            $nota->fecha =Carbon::now();
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

    public function report(){
        return view('admin.notadecompras.reporte');
    }

    public function generar(Request $request)
    {
        $fechaInicio = $request->input('fechainicio');
        $fechaFin = $request->input('fechafin');
    
        // Buscar las notas de venta que estén entre las fechas especificadas
        $notadecompras = Notadecompra::whereBetween('fecha', [$fechaInicio, $fechaFin])->get();

        if ($notadecompras->isEmpty()) {
            // Si no se encontraron notas de compra, redirigir al usuario con un mensaje de error
            return redirect()->route('admin.notadecompras.report')
                ->with('error', 'No se encontraron compras entre las fechas especificadas.');
        }
        $request->session()->forget('error');
        // Cargar la vista del PDF con los datos de las notas de compra
        $pdf = \PDF::loadView('admin.notadecompras.pdf', compact('notadecompras'));
        $pdf->setPaper('A4', 'portrait');
    
        return $pdf->download($fechaInicio. ' -> ' .$fechaFin.' .pdf');
    }
}
