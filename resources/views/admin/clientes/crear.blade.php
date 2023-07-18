@extends('adminlte::page')

@section('title', 'Lista de Clientes')

@section('content_header')
<h1>Nuevo Cliente</h1>
@stop

@section('content')
<form action="{{ route ('admin.clientes.store')}}" method="POST">
  @csrf
  <div class="row g-3">
    <div class="col-12 col-md-4">
      <label for="" class="form-label">Nombre</label>
      <input autocomplete="off" id="nombre" name="nombre" type="text" class="form-control" tabindex="1"
        placeholder="Ingrese el nombre del cliente">
    </div>

    <div class="col-12 col-md-4">
      <label for="" class="form-label">Apellido Paterno</label>
      <input autocomplete="off" id="apellidopaterno" name="apellidopaterno" type="text" class="form-control"
        tabindex="2" placeholder="Ingrese el apellido paterno del cliente">
    </div>

    <div class="col-12 col-md-4">
      <label for="" class="form-label">Apellido Materno</label>
      <input autocomplete="off" id="apellidomaterno" name="apellidomaterno" type="text" class="form-control"
        tabindex="3" placeholder="Ingrese el apellido materno del cliente">
    </div>

    <div class="col-12 col-md-4">
      <label for="" class="form-label">Direccion</label>
      <input autocomplete="off" id="direccion" name="direccion" type="text" class="form-control" tabindex="4"
        placeholder="Ingrese la direccion del cliente">
    </div>

    <div class="col-12 col-md-4">
      <label for="" class="form-label">Correo</label>
      <input autocomplete="off" id="correo" name="correo" type="text" class="form-control" tabindex="5"
        placeholder="Ingrese la correo del cliente">
    </div>

    <div class="col-12 col-md-4">
      <label for="" class="form-label">Telefono</label>
      <input autocomplete="off" id="telefono" name="telefono" type="number" class="form-control" tabindex="6"
        placeholder="Ingrese el numero telefonico del cliente">
    </div>
  </div>
  <a href="{{ route('admin.clientes.index')}}" class="btn btn-secondary" tabindex="7">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="8">Guardar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop