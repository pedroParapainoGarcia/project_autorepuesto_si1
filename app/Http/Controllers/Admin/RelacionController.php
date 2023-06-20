<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetalleCompra;
use App\Models\Notadecompra;
use App\Models\Repuesto;


use Illuminate\Http\Request;


class RelacionController extends Controller
{
    public function index(){
        $detallecompras = DetalleCompra::all();
        return view('admin.notadecompras.index',compact('detallecompras'));
    }
}
