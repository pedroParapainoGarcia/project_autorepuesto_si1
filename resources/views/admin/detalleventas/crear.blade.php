@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Agregar Venta</h1>
@stop

@section('content')
<form action="{{ route ('admin.detalleventas.store')}}" method="POST">
  @csrf

  <div class="mb-3">
    {{ Form::select('id_repuesto', $repuestosOptions, $detalleventa->id_repuesto, ['class' => 'form-control' . ($errors->has('id_repuesto') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el repuesto']) }}
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Nota de venta</label>
    <input id="id_notadeventa" name="id_notadeventa" type="number" step="any" value="{{$id}}" class="form-control" tabindex="1"
    placeholder="este campo se actualizara al registrar un ingreso de articulo">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Cantidad</label>
    <input autocomplete="off" id="cantidad" name="cantidad" type="number" class="form-control" tabindex="2"
      placeholder="Ingrese la cantidad de repuestos a vender">
  </div>

  {{--<div class="mb-3">
    <label for="" class="form-label">SubTotal</label>
    <input id="subtotal" name="subtotal" type="number" step="0.01" min="0" class="form-control" tabindex="3" value="0" placeholder="Ingrese el Subtotal del Repuesto">
  </div>--}}

  <a href="{{ route('admin.detalleventas.index',['id' => $id])}}" class="btn btn-secondary" tabindex="3">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop