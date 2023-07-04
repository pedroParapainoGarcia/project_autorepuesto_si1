<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetalleCompra;
use App\Http\Requests\StoreDetalleCompraRequest;
use App\Http\Requests\UpdateDetalleCompraRequest;
use App\Models\Nombrerepuesto;
use App\Models\Notadecompra;
use App\Models\Repuesto;
use Illuminate\Http\Request;



class DetalleCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){
        $id = $request->id;
       
        $detallecompras = DetalleCompra::where('id_notadecompra',$id)->get();
        $repuestos = Repuesto::all();
        $nombres = Nombrerepuesto::all();
        $notadecompras = Notadecompra::all();
        return view('admin.detallecompras.index',compact('detallecompras','repuestos','nombres','notadecompras','id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {   
        $id = $request->id;
        $detallecompra = new DetalleCompra();
        $repuestos= Repuesto::pluck('descripcion','id');   
        return view('admin.detallecompras.crear',compact('detallecompra','repuestos','id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'id_repuesto'=>'required',           
            'id_notadecompra'=>'required',
            'cantidad'=>'required',
            'costounitario'=>'required']);
            $id = $request->get('id_notadecompra');
            $idR = $request->get('id_repuesto');
            $detalle = new DetalleCompra();
            $detalle->id_repuesto = $request->get('id_repuesto');
            $detalle->id_notadecompra = $request->get('id_notadecompra');
            $detalle->cantidad = $request->get('cantidad');
            $detalle->costounitario = $request->get('costounitario');
            $detalle->save();

            $repuesto = Repuesto::find($idR);
            $repuesto->stock += $request->get('cantidad');
            $repuesto->save();

            $nota = Notadecompra::find($id);
            $nota->costototal += ($detalle->cantidad * $detalle->costounitario);
            $nota->save();

            /*$bitacora = new Bitacora();   
            $id = Auth::id();       
            $bitacora->causer_id = $id ;
            $bitacora->name = Role::find($id)->name;
            $bitacora->long_name = 'Modelos';
            $bitacora->descripcion = 'Registró';
            $bitacora->subject_id = $modelo->id;        
            $bitacora->save();*/
        
         return redirect()->route('admin.detallecompras.index',compact('id'));   
    }

    /**
     * Display the specified resource.
     */
    public function show(DetalleCompra $detalleCompra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetalleCompra $detalleCompra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDetalleCompraRequest $request, DetalleCompra $detalleCompra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detalle =DetalleCompra::find($id);
        $idnota = $detalle->id_notadecompra;
        $idrepuesto = $detalle->id_repuesto;
        
        $nota = Notadecompra::find($idnota);
        $nota->costototal -= ($detalle->cantidad * $detalle->costounitario);
        $nota->save();

        $repuesto = Repuesto::find($idrepuesto);
        $repuesto->stock -= $detalle->cantidad;
        $repuesto->save();
        
        $detalle->delete();
        /*$bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Modelos';
        $bitacora->descripcion = 'Eliminó';
        $bitacora->subject_id = $modelo->id;        
        $bitacora->save();*/

        return redirect()->route('admin.detallecompras.index',['id' => $idnota]);
    }
}
