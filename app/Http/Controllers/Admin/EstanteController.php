<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estante;

class EstanteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $estantes = Estante::all();
        return view('admin.estantes.index')->with('estantes',$estantes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.estantes.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $estantes = new Estante();

        $estantes->descripcion = $request->get('descripcion');
        $estantes->capacidad = $request->get('capacidad');

        $estantes->save();

        return redirect()->route('admin.estantes.index');


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
        $estantes = Estante::find($id);
        return view('admin.estantes.editar')->with('estantes',$estantes);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $estantes = Estante::find($id);  

        $estantes->descripcion = $request->get('descripcion');
        $estantes->capacidad = $request->get('capacidad');

        $estantes->save();
       
        return redirect()->route('admin.estantes.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $estantes = Estante::find($id);
        $estantes->delete();
        return redirect()->route('admin.estantes.index');
    }
}
