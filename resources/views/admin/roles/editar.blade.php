@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Editar Rol</h1>
@stop

@section('content')
{{-- <div class="card">
  <div class="card-body">
    {!! Form::model($role, ['route' => ['admin.roles.update',$role->id], 'method' =>'PATCH']) !!}
    @include('admin.roles.partials.form')

    <a href="{{ route('admin.roles.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>

    {!! Form::close() !!}
  </div>
</div>
@stop --}}

<form action="{{ route ('admin.roles.update',$role->id)}}" method="POST">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="name" name="name" type="text" class="form-control" value="{{$role->name}}">
  </div>


  {{-- <h2 class="h3">Permisos para este Rol:</h2>
  @foreach ($permissions as $permission)
  <div>
    <label>
      {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=> 'mr-1']) !!}
      {{$permission->description}}

    </label>
  </div>
  @endforeach --}}

  <div class="form-group">
    <label for="">Permisos para este Rol:</label>
    <br/>
    @foreach($permission as $value)
        <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
        {{ $value->description }}</label>
    <br/>
    @endforeach
</div>

  <a href="{{route('admin.roles.index')}}" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop