@extends('adminlte::page')

@section('title', 'Editar datos de Usuarios')

@section('content_header')
<h1>asignar un rol</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <p class="h5">Nombre:</p>
        <p class="form-control">{{$usuario->name}}</p>
    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>console.log('Hi!');</script>
@stop