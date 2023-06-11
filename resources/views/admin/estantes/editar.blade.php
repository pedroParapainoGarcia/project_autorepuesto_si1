@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Editar Estantes</h1>
@stop

@section('content')
<form action="{{ route ('admin.estantes.update',$estantes->id)}}" method="POST">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label for="" class="form-label">Descripcion</label>
    <input id="descripcion" name="descripcion" type="text" class="form-control" value="{{$estantes->descripcion}}">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Capacidad</label>
    <input id="capacidad" name="capacidad" type="number" class="form-control" value="{{$estantes->capacidad}}">
  </div>

  <a href="{{ route('admin.estantes.index')}}" class="btn btn-secondary" tabindex="3">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop