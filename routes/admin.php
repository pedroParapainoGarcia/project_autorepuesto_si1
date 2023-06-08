<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RolController; 
use App\Http\Controllers\Admin\UserController;
use  App\Http\Controllers\Admin\BitacoraController;
use App\Http\Controllers\RepuestoController; 


Route::get('', [HomeController::class,'index'])->middleware('can:admin.home')->name('admin.home');//

 Route::resource('usuarios', UserController::class)->only(['index','create','edit','update','store','destroy'])->except('show')->names('admin.usuarios');

 Route::resource('roles', RolController::class)->except('show')->names('admin.roles');

 Route::resource('bitacora',BitacoraController::class)->only(['index'])->names('admin.bitacora');

//Route::resource('repuestos', RepuestoController::class)->only(['index','editar','crear'])->names('admin.articulos');


//y creamos un grupo de rutas protegidas para los controladores
//  Route::group(['middleware' => ['auth']], function() {
//      Route::resource('roles', RolController::class)->names('admin.roles');
//      Route::resource('usuarios', UserController::class)->names('admin.usuarios');
    
//  });



