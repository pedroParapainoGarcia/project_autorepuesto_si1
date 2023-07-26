@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Agregar Compra</h1>
@stop

@section('content')
<form action="{{ route ('admin.detallecompras.store')}}" method="POST">
  @csrf
  <div class="row g-3">

    <div class="col-12 col-md-4">

      <div class="form-group">
        {{ Form::label ('Repuesto a comprar')}}
        {{Form::select('id_repuesto',$repuestos,$detallecompra->id_repuesto,['class' => 'form-control'
        .($errors->has('id_repuesto') ? ' is-invalid' : ''), 'placeholder'=>'Seleccione el repuesto']) }}
        {!! $errors->first('id_repuesto', '<div class="invalid-feedback">:message</div>')!!}
      </div>
    </div>

    <div class="col-12 col-md-4">
      <label for="" class="form-label">Nota de compra</label>
      <input id="id_notadecompra" name="id_notadecompra" type="number" step="any" value="{{$id}}" class="form-control"
        tabindex="1" placeholder="este campo se actualizara al registrar un ingreso de articulo">
    </div>

    <div class="col-12 col-md-4">
      <label for="" class="form-label">Codigo</label>
      <input autocomplete="off" id="codigo" name="codigo" type="text" class="form-control"
        placeholder="Ingrese el codigo del  repuesto">
    </div>

    <div class="col-12 col-md-4">
      <label for="" class="form-label">Cantidad</label>
      <input autocomplete="off" id="cantidad" name="cantidad" type="number" class="form-control" tabindex="2"
        placeholder="Ingrese la cantidad">
    </div>

    <div class="col-12 col-md-4">
      <label for="" class="form-label">Costo Unitario</label>
      <input id="costounitario" name="costounitario" type="number" step="0.01" min="0" class="form-control" tabindex="3"
        placeholder="Ingrese el Costo Unitario del Repuesto">
    </div>
  </div>
  <a href="{{ route('admin.detallecompras.index',['id' => $id])}}" class="btn btn-secondary" tabindex="3">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop