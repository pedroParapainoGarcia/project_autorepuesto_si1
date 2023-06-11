@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
    <h1>Editar  Año de Fabricacion</h1>
@stop

@section('content')
   <form action="{{ route ('admin.años.update',$años->id)}}" method="POST">      
   @csrf
   @method('PUT')
 
  <div class="mb-3">
    <label for="" class="form-label">Año</label>
    <input autocomplete="off"  id="añofabrica" name="añofabrica" type="year" class="form-control" value="{{$años->añofabrica}}">
  </div>
  
  <a href="{{ route('admin.años.index')}}" class="btn btn-secondary" tabindex="3">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
@stop