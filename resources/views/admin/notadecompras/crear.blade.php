@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Crear Nueva Nota de Compra</h1>
@stop

@section('content')
<form action="{{ route ('admin.notadecompras.store')}}" method="POST">
  @csrf
  <div class="mb-3">
    <label for="" class="form-label">Numero de Documento</label>
    <input autocomplete="off" id="nrodoc" name="nrodoc" type="number" class="form-control" tabindex="1" placeholder="Ingrese el numero del documento">
  </div>

  <div class="mb-3">   
    <div class="form-group">
        {{ Form::label ('Proveedores')}}
        {{Form::select('id_proveedor',$proveedores,$notadecompra->id_proveedor,['class' => 'form-control' .($errors->has('id_proveedor') ? ' is-invalid' : ''), 'placeholder'=>'Seleccione un proveedor']) }}
        {!! $errors->first('id_proveedor', '<div class="invalid-feedback">:message</div>')!!}
    </div>
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Costo Total</label>
    <input id="costototal" name="costototal" type="number" step="0.01" value="0" class="form-control" tabindex="2" placeholder="Ingrese el Costo Total">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Fecha</label>
    <input autocomplete="off" id="fecha" name="fecha" type="date" class="form-control" tabindex="3" placeholder="Ingrese la fecha de la compra">
  </div>

  

  <a href="{{ route('admin.notadecompras.index')}}" class="btn btn-secondary" tabindex="4">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop