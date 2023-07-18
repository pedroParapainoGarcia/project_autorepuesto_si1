<?php

namespace App\Http\Controllers;

use App\Models\DetalleCompra;
use App\Models\DetalleSalida;
use App\Models\NotaSalida;
use App\Models\Repuesto;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class DetallesalidaController extends Controller
{

    public function terminarOCancelarVenta(Request $request)
    {
        if ($request->input("accion") == "terminar") {
            return $this->terminarBaja($request);
        } else {
            return $this->cancelarBaja();
        }
    }

    public function terminarBaja(Request $request)
    {


        $id = Auth::id();
        $notadesalida = new NotaSalida();
        $notadesalida->fecha = Carbon::now();
        $notadesalida->costototal = 0.00;
        $notadesalida->id_usuario = User::find($id)->name;
        $notadesalida->save();

        // $bitacora = new Bitacora();       
        // $bitacora->causer_id = $id ;
        // $bitacora->name = Role::find($id)->name;
        // $bitacora->long_name = 'Nota de Ventas';
        // $bitacora->descripcion = 'Registró una venta';
        // $bitacora->subject_id = $nota->id;        
        // $bitacora->save();

        return redirect()->route('admin.detallesalidas.index');
    }





    public function cancelarBaja()
    {
        // $this->vaciarRepuestos();
        return redirect()->route("vender.index")->with("mensaje", "Baja de Repuesto cancelada");
    }


    public function agregarProductoVenta(Request $request)
    {

        $repuestos = Repuesto::pluck('descripcion', 'id');
      
        foreach ($repuestos as $repuesto) {
            // El producto que se da de baja...
            $this->validate(request(), [
                'id_notasalida' => 'required',
                'descripcion' => 'required',
                'codigoRepuesto' => 'required',
                'cantidad' => 'required',
                'costounitario' => 'required'
            ]);

            
            $idnota = $request->get('id_notasalida');
            $notasalida = NotaSalida::find($idnota);

            $cod = $request->get('codigoRepuesto');
            $detalleActual = DetalleCompra::find($cod);


            $repuestoRetirado = new DetalleSalida();

            $repuestoRetirado->id_notasalida = $notasalida->id;
            $repuestoRetirado->id_repuesto = $repuesto->id;
            $repuestoRetirado->descripcion = $repuesto->descripcion;
            $repuestoRetirado->codigo = $detalleActual->codigo;
            $repuestoRetirado->cantidad = $request->get('cantidad');
            $repuestoRetirado->costounitario = $detalleActual->costounitario;
            $repuestoRetirado->save();
            // Y restamos el stock del repuesto
            $repuestoActualizado = Repuesto::find($repuesto->id);
            $repuestoActualizado->existencia -= $repuestoRetirado->cantidad;
            $repuestoActualizado->save();
        }

        return redirect()->route("admin.detallesalidas.index")->with("mensaje", "Baja de Repuesto terminada");

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->id;
        $notadesalidas = NotaSalida::all();
        $detallesalidas = DetalleSalida::where('id_notadeventa', $id)->get();
        $detallesCompra = DetalleCompra::All();
        $repuestos = Repuesto::select('id', 'descripcion', 'id_modelo', 'id_año') ->get();

    $repuestosOptions = [];

    foreach ($repuestos as $repuesto) {
        $modeloNombre = $repuesto->modelos->nombre ?? 'Sin modelo';
        $añoFabrica = $repuesto->años->añofabrica ?? 'Sin año';
        $marca = $repuesto->modelos->marcas->nombre ?? 'Sin marca';
        $descripcion = $repuesto->descripcion . ' - ' . $marca . ' - ' . $modeloNombre . ' - ' . $añoFabrica;
        $repuestosOptions[$repuesto->id] = $descripcion;
    }
        
        return view('admin.detalleventas.sacar', compact('detallesalidas', 'repuestosOptions', 'detallesCompra', 'notadesalidas', 'id'));
    }

}
