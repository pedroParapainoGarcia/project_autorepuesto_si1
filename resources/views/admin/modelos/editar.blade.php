@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Editar Modelos</h1>
@stop

@section('content')
<form action="{{ route ('admin.modelos.update',$modelo->id)}}" method="POST">
  @csrf
  @method('PUT')
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
      <div class="form-group">
        <label for="" class="form-label">Modelo</label>
        <input id="nombre" name="nombre" type="text" class="form-control" value="{{$modelo->nombre}}">
      </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6">
      <div class="form-group">
        {{ Form::label ('Marcas')}}
        {{Form::select('id_marca',$marca,$modelo->id_marca,['class' => 'form-control' .($errors->has('id_marca') ? '
        is-invalid' : '')]) }}
        {!! $errors->first('id_marca', '<div class="invalid-feedback">:message</div>')!!}
      </div>
    </div>
  </div>


  <a href="{{ route('admin.modelos.index')}}" class="btn btn-secondary" tabindex="3">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Actualizar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop