<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetalleCompra;
use App\Models\Detallesalida;
use App\Models\Notasalida;
use App\Models\Repuesto;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class NotasalidaController extends Controller
{
    //
    public function index(Request $request)
    {
        $id = $request->id;
        $notasalida=Notasalida::all();        
        $fechaActual = Carbon::now();

        return view('admin.notasalidas.index', compact('notasalida', 'fechaActual','id'));
    }


    public function create(Request $request)
    {
        //

    }

    public function store(Request $request)
    {
        //        
    }

    public function show($id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
     
    public function pdf($id){
       
        $notasalida = Notasalida::findOrFail($id); // Obtener la venta específica por ID

        $pdf = PDF::loadView('admin.notasalidas.pdf', compact('notasalida'));

        // Opcional: Descargar el PDF directamente
        // return $pdf->download('venta_' . $venta->id . '.pdf');

        // Opcional: Mostrar el PDF en el navegador
        return $pdf->stream('notadesalidas_' . $notasalida->id . '.pdf');
    }

    
}
