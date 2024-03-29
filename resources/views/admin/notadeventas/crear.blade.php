@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Crear Nueva Nota de Venta</h1>
@stop

@section('content')
<form action="{{ route ('admin.notadeventas.store')}}" method="POST">
  @csrf
  <div class="row g-3">
    <div class="col-12 col-md-4">
      <div class="form-group">
        {{ Form::label('Clientes') }}
        {{ Form::select('id_cliente', $clientes->pluck('Nombre', 'id')->map(function ($nombre, $id) use ($clientes) {
        $cliente = $clientes->find($id);
        return "$nombre - $cliente->apellido_paterno $cliente->apellido_materno";
        }), $notadeventa->id_cliente, ['class' => 'form-control' . ($errors->has('id_cliente') ? ' is-invalid' : ''),
        'placeholder' => 'Seleccione un cliente']) }}
        {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</div>') !!}
      </div>
    </div>

    <div class="col-12 col-md-4">
      <label for="" class="form-label">Descripcion</label>
      <input autocomplete="off" id="descripcion" name="descripcion" type="text" class="form-control" tabindex="1"
        placeholder="Ingrese una descripcion de la venta">
    </div>

    <div class="col-12 col-md-4 py-4">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="notadepago" name="notadepago" value="1" tabindex="4">
        <label class="form-check-label" for="notadepago">Nota de Pago</label>
      </div>
    </div>
  </div>
  <a href="{{ route('admin.notadeventas.index')}}" class="btn btn-secondary" tabindex="4">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop