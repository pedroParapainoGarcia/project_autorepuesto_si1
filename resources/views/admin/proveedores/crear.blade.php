@extends('adminlte::page')

@section('title', 'Lista de Usuarios')

@section('content_header')
<h1>Alta de Proveedores</h1>
@stop

@section('content')
<form action="{{ route ('admin.proveedores.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="" class="form-label">Nombre</label>
      <input autocomplete="off" id="nombre" name="nombre" type="text" class="form-control" tabindex="1"
        placeholder="Ingrese el nombre del proveedor">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Direccion</label>
        <input autocomplete="off" id="direccion" name="direccion" type="text" class="form-control" tabindex="2"
          placeholder="Ingrese la direccion del proveedor">
      </div>
  
    <div class="mb-3">
      <label for="" class="form-label">Telefono</label>
      <input autocomplete="off" id="telefono" name="telefono" type="number" class="form-control" tabindex="3" placeholder="Ingrese el numero telefonico del proveedor">
    </div>
  
  
    <a href="{{ route('admin.proveedores.index')}}" class="btn btn-secondary" tabindex="3">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  </form>
  @stop
  
  @section('css')
  <link rel="stylesheet" href="/css/admin_custom.css">
  @stop
  
  @section('js')
  @stop