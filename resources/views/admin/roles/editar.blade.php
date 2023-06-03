@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Editar Rol</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model($role, ['route' => ['admin.roles.update',$role->id], 'method' =>'put']) !!}
        @include('admin.roles.partials.form')

        <a href="{{ route('admin.roles.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
          <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>

        {!! Form::close() !!}
    </div>
</div>
@stop