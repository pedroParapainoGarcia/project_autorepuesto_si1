<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(){
        $fechaActual = Carbon::now();
        return view('admin.index', compact('fechaActual'));
    }
}
