<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\Admin\UserController;
use  App\Http\Controllers\Admin\BitacoraController;
use  App\Http\Controllers\Admin\NombrerepuestoController;
use  App\Http\Controllers\Admin\CategoriaController;
use  App\Http\Controllers\Admin\MarcaController;
use  App\Http\Controllers\Admin\AñoController;
use App\Http\Controllers\Admin\DetalleCompraController;
use  App\Http\Controllers\Admin\EstanteController;
use  App\Http\Controllers\Admin\ModeloController;
use App\Http\Controllers\Admin\NotadecompraController;
use App\Http\Controllers\Admin\ProveedorController;
//use App\Http\Controllers\Admin\RelacionController;
use  App\Http\Controllers\Admin\RepuestoController;


Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home'); //

Route::resource('usuarios', UserController::class)->only(['index', 'create', 'edit', 'update', 'store', 'destroy'])->except('show')->names('admin.usuarios');

Route::resource('roles', RolController::class)->except('show')->names('admin.roles');

Route::resource('bitacoras', BitacoraController::class)->names('admin.bitacoras');

Route::resource('nombrerepuestos', NombrerepuestoController::class)->names('admin.nombrerepuestos');

Route::resource('categorias', CategoriaController::class)->names('admin.categorias');

Route::resource('marcas', MarcaController::class)->names('admin.marcas');

Route::resource('modelos', ModeloController::class)->names('admin.modelos');

Route::resource('años', AñoController::class)->names('admin.años');

Route::resource('estantes', EstanteController::class)->names('admin.estantes');

Route::resource('repuestos', RepuestoController::class)->names('admin.repuestos');

Route::resource('proveedores', ProveedorController::class)->names('admin.proveedores');

Route::resource('notadecompras', NotadecompraController::class)->names('admin.notadecompras');

Route::resource('detallecompras', DetalleCompraController::class)->names('admin.detallecompras');
