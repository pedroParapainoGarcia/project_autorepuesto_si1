<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;


class ClienteController extends Controller
{
    //
    public function index()
    {
        $clientes = Cliente::all();
        return view('admin.clientes.index',compact('clientes'));
    }

    public function create()
    {
        return view('admin.clientes.crear');
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
            'nombre' => 'required|string',
            'apellidopaterno' => 'required|string',
            'apellidomaterno' => 'required|string',
            'direccion' => 'required|string',
            'correo' => 'required|string',
            'telefono' => 'required|integer',  
        ]); 

        $cliente = new Cliente();
        $cliente->Nombre = $request->get('nombre');
        $cliente->apellido_paterno = $request->get('apellidopaterno');
        $cliente->apellido_materno = $request->get('apellidomaterno');
        $cliente->direccion = $request->get('direccion');
        $cliente->correo = $request->get('correo');
        $cliente->telefono = $request->get('telefono');
        $cliente->save();

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Clientes';
        $bitacora->descripcion = 'Registró';
        $bitacora->subject_id = $cliente->id;        
        $bitacora->save();

        return redirect()->route('admin.clientes.index');  


    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $cliente = Cliente::find($id);     
    
        return view('admin.clientes.editar',compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
    
        $cliente->Nombre = $request->get('Nombre');
        $cliente->apellido_paterno = $request->get('apellido_paterno');
        $cliente->apellido_materno = $request->get('apellido_materno');
        $cliente->direccion = $request->get('direccion');
        $cliente->correo = $request->get('correo');
        $cliente->telefono = $request->get('telefono');
        $cliente->save();
    
        $bitacora = new Bitacora();
        $id = Auth::id();
        $bitacora->causer_id = $id;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Clientes';
        $bitacora->descripcion = 'Actualizó';
        $bitacora->subject_id = $cliente->id;
        $bitacora->save();
    
        return redirect()->route('admin.clientes.index');
    }

    public function destroy(string $id)
    {
        $cliente = Cliente::find($id);

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Clientes';
        $bitacora->descripcion = 'Eliminó';
        $bitacora->subject_id = $cliente->id;        
        $bitacora->save();

        $cliente->delete();
        return redirect()->route('admin.clientes.index');
    }
}
