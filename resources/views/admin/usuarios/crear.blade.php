@extends('adminlte::page')

@section('title', 'Lista de Usuarios')

@section('content_header')
<h1>Crear Usuarios</h1>
@stop

@section('content')

<form action="/usuarios" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="name" name="name" type="text" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Correo</label>
        <input id="email" name="email" type="text" class="form-control" tabindex="2">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Contraseña</label>
        <input id="password" name="password" type="text" class="form-control" tabindex="3">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Confirmar Contraseña</label>
        <input id="password" name="password" type="text" class="form-control" tabindex="3">
    </div>
    
    {{-- asignacion de roles al crear usuarios --}}
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="">Roles</label>
            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
        </div>
    </div>


    <a href="/usuarios" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>


</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop