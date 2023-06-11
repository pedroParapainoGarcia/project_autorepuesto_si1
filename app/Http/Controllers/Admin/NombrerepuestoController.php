<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nombrerepuesto;

class NombrerepuestoController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.nombrerepuestos.index')->only('index');
        $this->middleware('can:admin.nombrerepuestos.create')->only('create','store');
        $this->middleware('can:admin.nombrerepuestos.edit')->only('edit','update');           
        $this->middleware('can:admin.nombrerepuestos.destroy')->only('destroy');      
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nombrerepuestos = Nombrerepuesto::all();
        return view('admin.nombrerepuestos.index')->with('nombrerepuestos',$nombrerepuestos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.nombrerepuestos.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nombrerepuestos = new Nombrerepuesto();

        $nombrerepuestos->nombre = $request->get('nombre');

        $nombrerepuestos->save();

        return redirect()->route('admin.nombrerepuestos.index');
       
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
        $nombrerepuestos = Nombrerepuesto::find($id);
        return view('admin.nombrerepuestos.editar')->with('nombrerepuestos',$nombrerepuestos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nombrerepuestos = Nombrerepuesto::find($id);

        $nombrerepuestos->nombre = $request->get('nombre');   

        $nombrerepuestos->save();
       
        return redirect()->route('admin.nombrerepuestos.index');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nombrerepuestos = Nombrerepuesto::find($id);
        $nombrerepuestos->delete();
        return redirect()->route('admin.nombrerepuestos.index');
    }
}
