@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Crear Nuevo Modelo</h1>
@stop

@section('content')
<form action="{{ route ('admin.modelos.store')}}" method="POST">
  @csrf
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
      <div class="form-group">
        <label for="" class="form-label">Modelo</label>
        <input autocomplete="off" id="nombre" name="nombre" type="text" class="form-control" tabindex="1"
          placeholder="Ingrese el nombre del modelo">
      </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6">
      <div class="form-group">
        {{ Form::label ('Marcas')}}
        {{Form::select('id_marca',$marcas,$modelo->id_marca,['class' => 'form-control' .($errors->has('id_marca') ? '
        is-invalid' : ''), 'placeholder'=>'Seleccione una Marca']) }}
        {!! $errors->first('id_marca', '<div class="invalid-feedback">:message</div>')!!}
      </div>
    </div>
  </div>

  <a href="{{ route('admin.modelos.index')}}" class="btn btn-secondary" tabindex="3">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop