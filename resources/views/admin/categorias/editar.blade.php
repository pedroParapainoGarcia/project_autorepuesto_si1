@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
    <h1>Editar  Categorias</h1>
@stop

@section('content')
   <form action="{{ route ('admin.categorias.update',$categorias->id)}}" method="POST">      
   @csrf
   @method('PUT')
 
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input autocomplete="off"  id="nombre" name="nombre" type="text" class="form-control" value="{{$categorias->nombre}}">
  </div>
  
  <a href="{{ route('admin.categorias.index')}}" class="btn btn-secondary" tabindex="3">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
@stop