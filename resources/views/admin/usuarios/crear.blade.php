@extends('adminlte::page')

@section('title', 'Lista de Usuarios')

@section('content_header')
<h1>Alta de Usuarios</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
  
        <div class="card-body">    

            @if ($errors->any())   
            <div class="alert alert-danger d-flex align-items-center" role="alert">                                                        
                {{-- <div class="alert alert-dark alert-dismissible fade show" role="alert"> --}}
                    {{-- <div class="alert alert-danger" role="alert"> --}}
                <strong>¡ Revise los campos !  </strong>                        
                    @foreach ($errors->all() as $error)                                    
                        <span>{{$error}}</span>
                    @endforeach                        
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif

            {!! Form::open(array('route' => 'admin.usuarios.store','method'=>'POST')) !!}

            @include('admin.usuarios.partials.form')

            <a href="{{ route('admin.usuarios.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
                <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
            {!! Form::close() !!}
            </div>
  </div>
@stop
    @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
    @stop