<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Bitacora;

class BitacoraController extends Controller
{
    
    public function index(){
        $bitacoras=Bitacora::all();
        return view('admin.bitacoras.index',compact('bitacoras'));
    }
}
