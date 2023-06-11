@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Crear Nuevo Estante</h1>
@stop

@section('content')
<form action="{{ route ('admin.estantes.store')}}" method="POST">
  @csrf
  <div class="mb-3">
    <label for="" class="form-label">Descripcion</label>
    <input autocomplete="off" id="descripcion" name="descripcion" type="text" class="form-control" tabindex="1"
      placeholder="Ingrese el nombre del estante">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Capacidad</label>
    <input autocomplete="off" id="capacidad" name="capacidad" type="number" class="form-control" tabindex="2" placeholder="Ingrese la capacidad del estante">
  </div>


  <a href="{{ route('admin.estantes.index')}}" class="btn btn-secondary" tabindex="3">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop