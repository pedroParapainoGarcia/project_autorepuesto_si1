@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
    <h1>Editar  Repuesto</h1>
@stop

@section('content')
   <form action="{{ route ('admin.nombrerepuestos.update',$nombrerepuestos->id)}}" method="POST">      
   @csrf
   @method('PUT')
 
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input autocomplete="off"  id="nombre" name="nombre" type="text" class="form-control" value="{{$nombrerepuestos->nombre}}">
  </div>
  
  <a href="{{ route('admin.nombrerepuestos.index')}}" class="btn btn-secondary" tabindex="3">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
@stop