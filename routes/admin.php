<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\RepuestoController; 


Route::get('', [HomeController::class,'index'])->name('admin.home');//->middleware('can:admin.home')

Route::resource('usuarios', UserController::class)->names('admin.usuarios');

Route::resource('roles', RolController::class)->names('admin.roles');

Route::resource('repuestos', RepuestoController::class)->only(['index','editar','crear'])->names('admin.articulos');






 