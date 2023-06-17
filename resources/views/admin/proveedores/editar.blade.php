@extends('adminlte::page')

@section('title', 'Editar datos de Usuarios')

@section('content_header')
<h1>Editar datos de Usuario</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
  
        <div class="card-body">    
            {!! Form::model($user, ['method' => 'PATCH','route' => ['admin.usuarios.update', $user->id]]) !!}

            @include('admin.usuarios.partials.formedit')

            <a href="{{ route('admin.usuarios.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
                <button type="submit" class="btn btn-primary" tabindex="4">Actualizar</button>
            {!! Form::close() !!}
            </div>
  </div>
@stop
     @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
    @stop 