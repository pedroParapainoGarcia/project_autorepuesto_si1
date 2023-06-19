@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Editar Nota de Compra</h1>
@stop

@section('content')
<form action="{{ route ('admin.notadecompras.update',$nota->id)}}" method="POST">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label for="" class="form-label">Nro Documento</label>
    <input id="nro_documento" name="nro_documento" type="number" class="form-control" tabindex="1" value="{{$nota->nro_documento}}">
  </div>

  <div class="mb-3"> 
    <div class="form-group">       
        {{ Form::label ('Proveedores')}}
        {{Form::select('id_proveedor',$proveedores,$nota->id_proveedor,['class' => 'form-control' .($errors->has('id_proveedor') ? ' is-invalid' : '')]) }}
        {!! $errors->first('id_proveedor', '<div class="invalid-feedback">:message</div>')!!}
    </div>
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Fecha</label>
    <input id="fecha" name="fecha" type="date" class="form-control" tabindex="2" value="{{$nota->fecha}}">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Costo Total</label>
    <input id="costototal" name="costototal" type="number" step="0.01" min="0" class="form-control" tabindex="3" value="{{$nota->costototal}}">
  </div>

  <a href="{{ route('admin.notadecompras.index')}}" class="btn btn-secondary" tabindex="4">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="5">Actualizar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop