<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repuesto;

class RepuestoController extends Controller
{
    function __construct()
    {
        //  $this->middleware('permission:ver-repuesto|crear-repuesto|editar-repuesto|borrar-repuesto')->only('index');
        //  $this->middleware('permission:crear-repuesto', ['only' => ['create','store']]);
        //  $this->middleware('permission:editar-repuesto', ['only' => ['edit','update']]);
        //  $this->middleware('permission:borrar-repuesto', ['only' => ['destroy']]);
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repuestos = Repuesto::all();
        return view('repuestos.index')->with('repuestos',$repuestos);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('repuestos.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     
        
        $repuestos = new Repuesto();

        $repuestos->nombre = $request->get('nombre');

        $repuestos->save();

        return redirect('/repuestos');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $repuesto = Repuesto::find($id);
        return view('repuesto.edit')->with('repuesto',$repuesto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $repuesto = Repuesto::find($id);

        $repuesto->nombre = $request->get('nombre');
   

        $repuesto->save();

        return redirect('/repuestos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $repuesto = Repuesto::find($id);
        $repuesto->delete();
        return redirect('/repuestos');
    }
}
