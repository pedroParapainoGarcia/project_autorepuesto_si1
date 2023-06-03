<?php

use Illuminate\Support\Facades\Route;
//agregamos los siguientes controladores
 
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RepuestoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
   return view('auth.login');

});


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',function() {
//  return view('dashboard');
// })->name('dashboard'); 



