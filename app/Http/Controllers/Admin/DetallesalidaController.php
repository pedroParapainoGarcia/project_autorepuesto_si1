<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetalleCompra;
use App\Models\Detallesalida;
use App\Models\Nombrerepuesto;
use App\Models\Notasalida;
use App\Models\Repuesto;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;





class DetallesalidaController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id;

        $id = Auth::id();       
        $vendedor = Role::find($id)->name;

        $detallesalidas = Detallesalida::where('id_notasalida', $id)->get();
        $repuestos = Repuesto::all();
        $nombres = Nombrerepuesto::all();
        $notadesalidas = Notasalida::all();
        return view('admin.detallesalidas.index', compact('detallesalidas', 'repuestos', 'nombres', 'notadesalidas', 'id','vendedor'));
    }

    public function create(Request $request)
    {
        $repuestos = Repuesto::select('id', 'descripcion', 'id_modelo', 'id_año')->get();

        $repuestosOptions = [];

        foreach ($repuestos as $repuesto) {
            $modeloNombre = $repuesto->modelos->nombre ?? 'Sin modelo';
            $añoFabrica = $repuesto->años->añofabrica ?? 'Sin año';
            $marca = $repuesto->modelos->marcas->nombre ?? 'Sin marca';
            $descripcion = $repuesto->descripcion . ' - ' . $marca . ' - ' . $modeloNombre . ' - ' . $añoFabrica;
            $repuestosOptions[$repuesto->id] = $descripcion;
        }

        $codigos = DetalleCompra::pluck('codigo', 'id');



        return view('admin.detallesalidas.crear', compact('repuestosOptions', 'codigos'));
    }


    public function store(Request $request)
    {
        // dd($request->all());


        $this->validate(request(), [
            'id_repuesto' => 'required',
            'codigoRepuesto' => 'required',
            'cantidad' => 'required'
        ]);

        //$usuarios= User::pluck('name','id'); 
        $id = Auth::id();
        $notasalida = new Notasalida();
        $notasalida->fecha = Carbon::now();
        $notasalida->costototal = 0.00; //se actualizara mas adelante 
        $notasalida->id_usuario = User::find($id)->id;
        $notasalida->save();

        $totalnota = 0;
        foreach ($request->id_repuesto as $key => $id_repuesto) {
            $repuesto = Repuesto::find($id_repuesto);
            $cod = $request->codigoRepuesto[$key];

            $detallecompra = DetalleCompra::where("codigo", "=", $cod)->first();
            $costounit =$detallecompra->costounitario;
           

            $detallesalida = new Detallesalida();
            $detallesalida->id_notasalida = $notasalida->id;
            $detallesalida->id_repuesto = $repuesto->id;
            $detallesalida->codigoRepuesto=$request->codigoRepuesto[$key];
            $detallesalida->cantidad = $request->cantidad[$key];
            $detallesalida->costounitario = $costounit;
            $subtotal = ($detallesalida->costounitario * $detallesalida->cantidad);
            $detallesalida->subtotal = $subtotal;
            $detallesalida->save();

            $totalnota += $subtotal;

            //actualizamos el stock del repuesto
            $repuesto->stock -= $detallesalida->cantidad;
            $repuesto->save();
        }

        $notasalida->costototal = $totalnota;
        $notasalida->save();
        return redirect()->route('admin.notasalidas.index')->with('success', 'Baja de Repuesto Registrada Correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
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
    public function destroy($id)
    {
        $nota = Notasalida::find($id);
        if (!$nota) {
            return redirect()->route('admin.notasalidas.index')->with('error', 'baja no encontrada');
        }

        Detallesalida::where('id_notasalida', $nota->id)->delete();
        foreach ($nota->detalles as $detallesalida) {
            $repuesto = Repuesto::find($detallesalida->id_repuestos);
            $repuesto->stock += $detallesalida->cantidad;
            $repuesto->save();
        }

        $nota->delete();

        return redirect()->route('admin.notasalidas.index')->with('error', 'nota eliminada');
    }
}
