@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Crear Nuevo Modelo</h1>
@stop

@section('content')
<form action="{{ route ('admin.modelos.store')}}" method="POST">
  @csrf
  <div class="mb-3">
    <label for="" class="form-label">Modelo</label>
    <input autocomplete="off" id="nombre" name="nombre" type="text" class="form-control" tabindex="1"
      placeholder="Ingrese el nombre del modelo">
  </div>

{{-- 
  <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <label for="">Marca</label>
        <select name=id_marca id=id_marca class="form-control">
            <option value="">    Seleccione una Marca   </option>

            @foreach($marcas as $marca)
            <option value="{{$marca['id']}}">{{$marca['nombre']}}</option>

            @endforeach
            
        </select>
          
      
      </div>
  </div> --}}

  <div class="mb-3">
    <div class="form-group">
        <label for="">Marcas</label>
        {{ Form::label ('Marca')}}
        {{Form::select('Marca', $marcas,$modelo->id_marca,['class' => 'form-control' .($errors->has('id_marca') ? ' is-invalid' : ''), 'placeholder'=>'Seleccione una Marca']) }}
        {{-- {!! $errors->first('id_marca', <div class="invalid-feedback">:message</p>)!!} --}}
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