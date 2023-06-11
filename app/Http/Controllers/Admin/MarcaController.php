<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $marcas = Marca::all();
        return view('admin.marcas.index',compat('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.marcas.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'nombre'=>'required',
]);
        // $marcas = new Marca();

        // $marcas->nombre = $request->get('nombre');

        // $marcas->save();

        // return redirect()->route('admin.marcas.index');

        $marca=Marca::create($request->all());
        return redirect()->route('admin.marcas.index');
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
        $marcas = Marca::find($id);
        return view('admin.marcas.editar')->with('marcas',$marcas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $marcas = Marca::find($id);

        $marcas->nombre = $request->get('nombre');   

        $marcas->save();
       
        return redirect()->route('admin.marcas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $marcas = Marca::find($id);
        $marcas->delete();
        return redirect()->route('admin.marcas.index');
    }
}
