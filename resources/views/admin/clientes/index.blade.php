@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Listado de Clientes</h1>
@stop

@section('content')

@can('admin.clientes.create')
    <a class="btn btn-primary mb-3" href="{{ route('admin.clientes.create')}}">CREAR</a>
@endcan

<table id="proveedores" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido_P</th>
            <th scope="col">Apellido_M</th>
            <th scope="col">Direccion</th>
            <th scope="col">Correo</th>
            <th scope="col">Telefono</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
        <tr>
            <td>{{$cliente->id}}</td>
            <td>{{$cliente->Nombre}}</td>
            <td>{{$cliente->apellido_paterno}}</td>
            <td>{{$cliente->apellido_materno}}</td>
            <td>{{$cliente->direccion}}</td>
            <td>{{$cliente->correo}}</td> 
            <td>{{$cliente->telefono}}</td>
            <td>
                @can('admin.clientes.destroy' )
                <form action="{{ route ('admin.clientes.destroy',$cliente->id)}}" method="POST">
                    @csrf

                    @can('admin.clientes.edit')
                    <a href="{{ route('admin.clientes.edit',$cliente->id)}}" class="btn btn-info">Editar</a>
                    @endcan

                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
                @endcan
            </td>



        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
    $('#proveedores').DataTable({        
            responsive: true,
            autoWidth: false,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "Nada encontrado - disculpa",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtrando de _MAX_ registros totales)",
                'search': 'Buscar:',
                'paginate':{
                    'next':'Siguiente',
                    'previous':'Anterior'
                }
            }
        });
    } );
</script>
@stop