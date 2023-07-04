<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Notadeventa;
use Illuminate\Http\Request;

class NotadepagoController extends Controller
{
    //
    public function index()
    {
        $notadeventas = Notadeventa::where('notadepago','1')->get();
        $clientes = Cliente::all();  
        return view('admin.notadepagos.index', compact('notadeventas', 'clientes'));
    }
}
