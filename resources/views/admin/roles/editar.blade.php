@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Editar Rol</h1>
@stop

@section('content')
<form action="{{ route ('admin.roles.update',$role->id)}}" method="POST">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label for="" class="form-label">Nombre de Rol</label>
    <input id="name" name="name" type="text" class="form-control" value="{{$role->name}}">
  </div>

  
  <div class="form-group">
    <label for="">Permisos para este Rol:</label>
    <br/>
    @foreach($permission as $privilegio)
        <label>{{ Form::checkbox('permission[]', $privilegio->id, in_array($privilegio->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
        {{ $privilegio->name }}</label>
    <br/>
    @endforeach
</div>

  


<a href="{{ route('admin.roles.index')}}" class="btn btn-secondary" tabindex="3">Cancelar</a>
<button type="submit" class="btn btn-primary" tabindex="4">Actualizar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop