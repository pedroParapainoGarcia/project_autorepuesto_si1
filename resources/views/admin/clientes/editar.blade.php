@extends('adminlte::page')

@section('title', 'Editar datos del Cliente')

@section('content_header')
<h1>Editar datos de cliente</h1>
@stop

@section('content')
<form action="{{ route ('admin.clientes.update',$cliente->id)}}" method="POST">
    @csrf
    @method('PUT')
  
    <div class="mb-3">
      <label for="" class="form-label">Nombre</label>
      <input id="Nombre" name="Nombre" type="text" class="form-control" value="{{$cliente->Nombre}}">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Apellido Paterno</label>
      <input id="apellido_paterno" name="apellido_paterno" type="text" class="form-control" value="{{$cliente->apellido_paterno}}">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Apellido Materno</label>
      <input id="apellido_materno" name="apellido_materno" type="text" class="form-control" value="{{$cliente->apellido_materno}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Direccion</label>
        <input id="direccion" name="direccion" type="text" class="form-control" value="{{$cliente->direccion}}">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Correo</label>
        <input id="correo" name="correo" type="text" class="form-control" value="{{$cliente->correo}}">
      </div>
  
    <div class="mb-3">
      <label for="" class="form-label">Telefono</label>
      <input id="telefono" name="telefono" type="number" class="form-control" value="{{$cliente->telefono}}">
    </div>

  
    <a href="{{ route('admin.clientes.index')}}" class="btn btn-secondary" tabindex="3">Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
  @stop
  
  @section('css')
  <link rel="stylesheet" href="/css/admin_custom.css">
  @stop
  
  @section('js')
  @stop