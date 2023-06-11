<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Año;


class AñoController extends Controller
{
    public function __construct()
    {    
         $this->middleware('can:admin.años.index')->only('index');
         $this->middleware('can:admin.años.create')->only('create','store');
         $this->middleware('can:admin.años.edit')->only('edit','update');           
         $this->middleware('can:admin.años.destroy')->only('destroy');
     }

    public function index()
    {
        $años = Año::all();
        return view('admin.años.index')->with('años',$años);
    }

 
    public function create()
    {
        return view('admin.años.crear');
    }

  
    public function store(Request $request)
    {
        $años = new Año();

        $años->añofabrica = $request->get('añofabrica');

        $años->save();

        return redirect()->route('admin.años.index');
    }

  
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $años = Año::find($id);
        return view('admin.años.editar')->with('años',$años);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $años = Año::find($id);

        $años->añofabrica = $request->get('añofabrica');   

        $años->save();
       
        return redirect()->route('admin.años.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $años = Año::find($id);
        $años->delete();
        return redirect()->route('admin.años.index');
    }
}
