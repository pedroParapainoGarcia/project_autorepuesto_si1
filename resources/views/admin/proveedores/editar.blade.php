@extends('adminlte::page')

@section('title', 'Editar datos del Proveedor')

@section('content_header')
<h1>Editar datos de proveedor</h1>
@stop

@section('content')
<form action="{{ route ('admin.proveedores.update',$proveedor->id)}}" method="POST">
    @csrf
    @method('PUT')
  
    <div class="mb-3">
      <label for="" class="form-label">Nombre</label>
      <input id="nombre" name="nombre" type="text" class="form-control" value="{{$proveedor->nombre}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Direccion</label>
        <input id="direccion" name="direccion" type="text" class="form-control" value="{{$proveedor->direccion}}">
      </div>
  
    <div class="mb-3">
      <label for="" class="form-label">Telefono</label>
      <input id="telefono" name="telefono" type="number" class="form-control" value="{{$proveedor->telefono}}">
    </div>
  
    <a href="{{ route('admin.proveedores.index')}}" class="btn btn-secondary" tabindex="3">Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
  @stop
  
  @section('css')
  <link rel="stylesheet" href="/css/admin_custom.css">
  @stop
  
  @section('js')
  @stop