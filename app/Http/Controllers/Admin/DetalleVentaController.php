<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\DetalleVenta;
use App\Models\Nombrerepuesto;
use App\Models\Notadeventa;
use App\Models\Repuesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Response;

class DetalleVentaController extends Controller
{
    public function index(Request $request){
        $id = $request->id;
       
        $detalleventas = DetalleVenta::where('id_notadeventa',$id)->get();
        $repuestos = Repuesto::all();
        $nombres = Nombrerepuesto::all();
        $notadeventas = Notadeventa::all();
        return view('admin.detalleventas.index',compact('detalleventas','repuestos','nombres','notadeventas','id'));
    }

    public function create(Request $request)
    {   
        $id = $request->id;
        $detalleventa = new DetalleVenta();    
        $repuestos = Repuesto::select('id', 'descripcion', 'id_modelo', 'id_año')
        ->get();
    
        $repuestosOptions = [];
        
        foreach ($repuestos as $repuesto) {
            $modeloNombre = $repuesto->modelos->nombre ?? 'Sin modelo';
            $añoFabrica = $repuesto->años->añofabrica ?? 'Sin año';
            $marca = $repuesto->modelos->marcas->nombre ?? 'Sin marca';
            $descripcion = $repuesto->descripcion . ' - ' . $marca . ' - ' . $modeloNombre . ' - ' . $añoFabrica;
            $repuestosOptions[$repuesto->id] = $descripcion;
        }

        return view('admin.detalleventas.crear',compact('detalleventa','repuestosOptions','id'));
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
            'id_repuesto'=>'required',           
            'id_notadeventa'=>'required',
            'cantidad'=>'required']);

            $id = $request->get('id_notadeventa');
            $idR = $request->get('id_repuesto');

            $detalle = new DetalleVenta();
            $detalle->id_repuesto = $request->get('id_repuesto');
            $detalle->id_notadeventa = $request->get('id_notadeventa');
            $detalle->cantidad = $request->get('cantidad');
            
            

            $repuesto = Repuesto::find($idR);
            $repuesto->stock -= $request->get('cantidad');
            $repuesto->save();

            $detalle->subtotal = ($request->get('cantidad') * $repuesto->precioventa);
            $detalle->save();

            $nota = Notadeventa::find($id);
            $nota->costototal += $detalle->subtotal;
            $nota->save();

            /*$bitacora = new Bitacora();   
            $id = Auth::id();       
            $bitacora->causer_id = $id ;
            $bitacora->name = Role::find($id)->name;
            $bitacora->long_name = 'Modelos';
            $bitacora->descripcion = 'Registró';
            $bitacora->subject_id = $modelo->id;        
            $bitacora->save();*/
        
         return redirect()->route('admin.detalleventas.index',compact('id'));   
    }

    /**
     * Display the specified resource.
     */
    public function show(DetalleVenta $detalleVenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetalleVenta $detalleVenta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detalle =DetalleVenta::find($id);
        $idnota = $detalle->id_notadeventa;
        $idrepuesto = $detalle->id_repuesto;
        
        $nota = Notadeventa::find($idnota);
        $nota->costototal -= $detalle->subtotal;
        $nota->save();

        $repuesto = Repuesto::find($idrepuesto);
        $repuesto->stock += $detalle->cantidad;
        $repuesto->save();
        
        
        /*$bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'DetalleVentas';
        $bitacora->descripcion = 'Eliminó';
        $bitacora->subject_id = $detalle->id;        
        $bitacora->save();*/

        $detalle->delete();
        
        return redirect()->route('admin.detalleventas.index',['id' => $idnota]);
    }

    public function generatePDF($id)
    {
        $notaDeVenta = Notadeventa::findOrFail($id);
        $costoTotal = $notaDeVenta->costototal;
        $fecha = $notaDeVenta->fecha;
        $apellidoP = $notaDeVenta->clientes->apellido_paterno;
        $apellidoM = $notaDeVenta->clientes->apellido_materno;
        $nombref = $notaDeVenta->clientes->Nombre;
        $nombre = $nombref . ' ' . $apellidoP . ' ' . $apellidoM;

        $data = [
            'detalleventas' => DetalleVenta::where('id_notadeventa',$id)->get(),
            'costoTotal' => $costoTotal,
            'nombre' => $nombre,
            'fecha' => $fecha,
        ];
        
        $pdf = \PDF::loadView('admin.detalleventas.pdf', $data);
        $pdf->setPaper('A4', 'portrait');
        
        
        return $pdf->download($nombre . '.pdf');
    }
}
