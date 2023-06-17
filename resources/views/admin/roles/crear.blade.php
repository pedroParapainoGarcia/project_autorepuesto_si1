@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Crear Nuevo Roles</h1>
@stop

@section('content') 
<form action="{{ route ('admin.roles.store')}}" method="POST">
  @csrf
  <div class="mb-3">
    <label for="" class="form-label">Nombre de Rol</label>
    <input autocomplete="off" id="name" name="name" type="text" class="form-control" tabindex="1"
      placeholder="Ingrese el nombre del Rol">
  </div>

  <div class="form-group">
    <label for="">Permisos para este Rol:</label>
    <br/>
    @foreach($permission as $permiso)
        <label>{{ Form::checkbox('permission[]', $permiso->id, false, array('class' => 'name')) }}
        {{ $permiso->description }}
    </label>
    <br/>
    @endforeach
  </div>

  <a href="{{ route('admin.roles.index')}}" class="btn btn-secondary" tabindex="3">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop