@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Editar Modelos</h1>
@stop

@section('content')
<form action="{{ route ('admin.modelos.update',$modelo->id)}}" method="POST">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label for="" class="form-label">Modelo</label>
    <input id="nombre" name="nombre" type="text" class="form-control" value="{{$modelo->nombre}}">
  </div>

  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <label for="">Marca</label>
      <select name=id_marca id=id_marca class="form-control">
         {{-- <option value="">    Seleccione una Marca   </option> --}}

          @foreach($marca as $marc)
          <option value="{{$marc['id']}}">{{$marc['nombre']}}</option>

          @endforeach
          
      </select>
        
    
    </div>
</div>

  <a href="{{ route('admin.modelos.index')}}" class="btn btn-secondary" tabindex="3">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop