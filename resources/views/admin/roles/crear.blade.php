@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Crear Nuevo Roles</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">

    {!! Form::open(['route' =>'admin.roles.store']) !!}

           @include('admin.roles.partials.form')

          <a href="{{ route('admin.roles.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
          <button type="submit" class="btn btn-primary" tabindex="4">Crear Rol</button>
          
            {!! Form::close() !!}

  </div>
</div>
@stop