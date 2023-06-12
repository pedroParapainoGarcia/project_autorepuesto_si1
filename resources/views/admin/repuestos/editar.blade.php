@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Editar Repuesto</h1>
@stop

@section('content')
<form action="{{ route ('admin.repuestos.update',$repuesto->id)}}" method="POST">
  @csrf
  @method('PUT')

  <div class="form-group">
    {{ Form::label ('Nombre')}}
    {{Form::select('id_nombrerepuesto',$nombrerepuesto,$repuesto->id_nombrerepuesto,['class' => 'form-control' .($errors->has('id_nombrerepuesto') ? ' is-invalid' : ''), 'placeholder'=>'Seleccione un nombre de repuesto']) }}
    {!! $errors->first('id_nombrerepuesto', '<div class="invalid-feedback">:message</div>')!!}
  </div>

  </div>

  <div class="mb-3">
    <label for="" class="form-label">Descripcion</label>
    <input autocomplete="off" id="descripcion" name="descripcion" type="text" class="form-control" value="{{$repuesto->descripcion}}">
 </div>

 <div class="mb-3">
  <label for="" class="form-label">PrecioVenta</label>
  <input id="precioventa" name="precioventa" type="number" step="any" value="{{$repuesto->precioventa}}" class="form-control" tabindex="3">
</div>

{{-- <div class="mb-3">
  <label for="" class="form-label">Stock</label>
  <input id="stock" name="stock" type="number" step="any" value="{{$repuesto->stock}}" class="form-control" tabindex="3">
</div> --}}

<div class="mb-3">
  <div class="form-group">      
    {{ Form::label ('Categoria')}}
    {{Form::select('id_categoria',$categoria,$repuesto->id_categoria,['class' => 'form-control' .($errors->has('id_categoria') ? 'is-invalid' : ''), 'placeholder'=>'Seleccione una Categoria']) }}
    {!! $errors->first('id_marca', '<div class="invalid-feedback">:message</div>')!!}
  </div>
</div>

<div class="mb-3">
  <div class="form-group">      
    {{ Form::label ('Modelo')}}
    {{Form::select('id_modelo',$modelo,$repuesto->id_modelo,['class' => 'form-control' .($errors->has('id_modelo') ? 'is-invalid' : ''), 'placeholder'=>'Seleccione un modelo']) }}
    {!! $errors->first('id_modelo', '<div class="invalid-feedback">:message</div>')!!}
  </div>
</div>

<div class="mb-3">
  <div class="form-group">      
    {{ Form::label ('Año')}}
    {{Form::select('id_año',$año,$repuesto->id_año,['class' => 'form-control' .($errors->has('id_año') ? 'is-invalid' : ''), 'placeholder'=>'Seleccione un año de fabricacion']) }}
    {!! $errors->first('id_año', '<div class="invalid-feedback">:message</div>')!!}
  </div>
</div>

<div class="mb-3">
  <div class="form-group">      
    {{ Form::label ('Ubicacion Almacenamiento')}}
    {{Form::select('id_estantes',$estante,$repuesto->id_estantes,['class' => 'form-control' .($errors->has('id_estantes') ? 'is-invalid' : ''), 'placeholder'=>'Seleccione una ubicacion donde almacenar']) }}
    {!! $errors->first('id_estantes', '<div class="invalid-feedback">:message</div>')!!}
  </div>
</div>



  <a href="{{ route('admin.repuestos.index')}}" class="btn btn-secondary" tabindex="3">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Actualizar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop