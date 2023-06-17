<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notadecompra;
use App\Models\Proveedore;
use App\Models\User;
use Illuminate\Http\Request;


class RelacionController extends Controller
{
    public function index(){
        $Notas = Notadecompra::all();
        //$Proveedores = Proveedor::all();
        return view('welcome',compact('Notas'));
    }
}
