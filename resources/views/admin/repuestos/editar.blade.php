@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Editar Repuestos</h1>
@stop

@section('content')
<form action="{{ route ('admin.repuestos.update',$repuesto->id)}}" method="POST">
  @csrf
  @method('PUT')
  <div class="row">


    <div class="col-xs-12 col-sm-12 col-md-6">
      <div class="form-group">
        {{ Form::label ('Nombre')}}
        {{Form::select('id_nombrerepuesto',$nombrerepuesto,$repuesto->id_nombrerepuesto,['class' => 'form-control'
        .($errors->has('id_nombrerepuesto') ? ' is-invalid' : '')]) }}
        {!! $errors->first('id_nombrerepuesto', '<div class="invalid-feedback">:message</div>')!!}
      </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6">
      <div class="form-group">
        <label for="" class="form-label">Descripcion</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" value="{{$repuesto->descripcion}}">
      </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4">
      <div class="form-group">
        <label for="" class="form-label">PrecioVenta</label>
        <input id="precioventa" name="precioventa" type="number" step="any" value="{{$repuesto->precioventa}}"
          class="form-control">
      </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-4">
      <div class="form-group">
        <label for="" class="form-label">Stock</label>
        <input id="stock" name="stock" type="number" step="any" value="{{$repuesto->stock}}" class="form-control">
      </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4">
      <div class="form-group">
        {{ Form::label ('Categoria')}}
        {{Form::select('id_categoria',$categoria,$repuesto->id_categoria,['class' => 'form-control'
        .($errors->has('id_categoria') ? 'is-invalid' : '')]) }}
        {!! $errors->first('id_categoria', '<div class="invalid-feedback">:message</div>')!!}
      </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4">
      <div class="form-group">
        {{ Form::label ('Modelo')}}
        {{Form::select('id_modelo',$modelo,$repuesto->id_modelo,['class' => 'form-control' .($errors->has('id_modelo')
        ?
        'is-invalid' : '')]) }}
        {!! $errors->first('id_modelo', '<div class="invalid-feedback">:message</div>')!!}
      </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4">
      <div class="form-group">
        {{ Form::label ('Año')}}
        {{Form::select('id_año',$año,$repuesto->id_año,['class' => 'form-control' .($errors->has('id_año') ?
        'is-invalid'
        : '')]) }}
        {!! $errors->first('id_año', '<div class="invalid-feedback">:message</div>')!!}
      </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4">
      <div class="form-group">
        {{ Form::label ('Ubicacion Almacenamiento')}}
        {{Form::select('id_estantes',$estante,$repuesto->id_estantes,['class' => 'form-control'
        .($errors->has('id_estantes') ? 'is-invalid' : '')]) }}
        {!! $errors->first('id_estantes', '<div class="invalid-feedback">:message</div>')!!}
      </div>
    </div>

  </div>
  <a href="{{ route('admin.repuestos.index')}}" class="btn btn-secondary" tabindex="3">Cancelar</a>
  <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop