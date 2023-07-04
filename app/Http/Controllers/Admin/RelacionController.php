<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetalleCompra;
use App\Models\Notadecompra;
use App\Models\Repuesto;
use App\Models\Proveedore;
use App\Models\User;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Bitacora;
use  App\Http\Controllers\Admin\BitacoraController;


class RelacionController extends Controller
{
    public function index()
    {

        $notadecompras = Notadecompra::all(); //nota de compra
        $proveedores = Proveedore::all();
        return view('admin.relaciones.index', compact('notadecompras', 'proveedores'));

        // $id = $request->id; //detalle de ventas       
        // $detallecompras = DetalleCompra::where('id_notadecompra',$id)->get();
        // $repuestos = Repuesto::all();
        // $nombres = Nombrerepuesto::all();
        // $notadecompras = Notadecompra::all();
        // return view('admin.detallecompras.index',compact('detallecompras','repuestos','nombres','notadecompras','id'));
    }


    public function create(Request $request)
    {
        $notadecompra = new Notadecompra();
        $proveedores = Proveedore::pluck('nombre', 'id');
        $id = $request->id;
        $detallecompra = new DetalleCompra();
        $detallescompras = DetalleCompra::where('id_notadecompra', $id)->get();
        $repuestos = Repuesto::pluck('descripcion', 'id');
        
        return view('admin.relaciones.crear', compact('notadecompra', 'proveedores', 'repuestos', 'detallecompra', 'detallescompras', 'id'));
    }
    public function store(Request $request)
    {
        $this->validate(request(), [ //validaciones para notaDeCompras
            'nro_documento' => 'required',
            'fecha' => 'required',
            'id_proveedor' => 'required',
            'costototal' => 'required'
        ]);

        $id = Auth::id();
        $nota = new Notadecompra();
        $nota->nro_documento = $request->get('nro_documento');
        $nota->fecha = $request->get('fecha');
        $nota->costototal = $request->get('costototal');
        $nota->id_proveedor = $request->get('id_proveedor');
        $nota->id_usuario = User::find($id)->name;
        $nota->save();


        $this->validate(request(), [ //validaciones para DetalleDeCompra
            'id_repuesto' => 'required',
            'id_notadecompra' => 'required',
            'cantidad' => 'required',
            'costounitario' => 'required',
            'subtotal' => 'required'
        ]);

        $id = $request->get('id_notadecompra');
        $idR = $request->get('id_repuesto');
        $detalle = new DetalleCompra();
        $detalle->id_repuesto = $request->get('id_repuesto');
        $detalle->id_notadecompra = $request->get('id_notadecompra');
        $detalle->cantidad = $request->get('cantidad');
        $detalle->costounitario = $request->get('costounitario');
        $detalle->subtotal = ($detalle->cantidad * $detalle->costounitario);
        $detalle->save();

        $repuesto = Repuesto::find($idR);
        $repuesto->stock += $request->get('cantidad');
        $repuesto->save();

        $nota->costototal += ($detalle->subtotal);
        $nota->save();

        $bitacora = new Bitacora();
        $id = Auth::id();
        $bitacora->causer_id = $id;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'NotaIngresos';
        $bitacora->descripcion = 'Registró';
        $bitacora->subject_id = $nota->id;
        $bitacora->save();

        //return redirect()->route('admin.relacion.index');


    }

    public function destroy(string $id)
    {
        //


    }
}
