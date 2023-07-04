@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Editar Nota de Venta</h1>
@stop

@section('content')
<form action="{{ route ('admin.notadeventas.update',$nota->id)}}" method="POST">
  @csrf
  @method('PUT')


  {{--<div class="mb-3">
    <div class="form-group">      
      {{ Form::label ('Cliente')}}
      {{Form::select('id_cliente',$clientes,$nota->id_cliente,['class' => 'form-control' .($errors->has('id_modelo') ? 'is-invalid' : ''), 'placeholder'=>'Seleccione un cliente']) }}
      {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</div>')!!}
    </div>
  </div>--}}
  
  <div class="mb-3">
    <div class="form-group">
        {{ Form::label('Cliente') }}
        {{ Form::select('id_cliente', $clientes, $nota->id_cliente, ['class' => 'form-control' . ($errors->has('id_cliente') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un cliente']) }}
        {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</div>') !!}
    </div>
  </div>


  <div class="mb-3">
    <label for="" class="form-label">Descripcion</label>
    <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="1" value="{{$nota->descripcion}}">
  </div>



  <div class="mb-3">
    <label for="" class="form-label">Fecha</label>
    <input id="fecha" name="fecha" type="date" class="form-control" tabindex="2" value="{{$nota->fecha}}">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Costo Total</label>
    <input id="costototal" name="costototal" type="number" step="0.01" min="0" class="form-control" tabindex="3" value="{{$nota->costototal}}">
  </div>

  <div class="mb-3">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="notadepago" name="notadepago" value="1" tabindex="7" {{ $nota->notadepago ? 'checked' : '' }}>
        <label class="form-check-label" for="notadepago">Nota de Pago</label>
    </div>
  </div>

  <a href="{{ route('admin.notadeventas.index')}}" class="btn btn-secondary" tabindex="4">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="5">Actualizar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop