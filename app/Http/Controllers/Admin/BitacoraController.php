<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Bitacora;

class BitacoraController extends Controller
{
    public function index(){
        $bitacora=Bitacora::all();
        return view('admin.bitacora.index',compact('bitacora'));
    }
}
