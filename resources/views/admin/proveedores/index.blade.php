@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Listado de Proveedores</h1>
@stop

@section('content')

@can('admin.proveedores.create')
    <a class="btn btn-primary mb-3" href="{{ route('admin.proveedores.create')}}">CREAR</a>
@endcan

<table id="proveedores" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-custom-red text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Direccion</th>
            <th scope="col">Telefono</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($proveedores as $proveedor)
        <tr>
            <td>{{$proveedor->id}}</td>
            <td>{{$proveedor->nombre}}</td>
            <td>{{$proveedor->direccion}}</td> 
            <td>{{$proveedor->telefono}}</td>
            <td>
                @can('admin.proveedores.destroy' )
                <form action="{{ route ('admin.proveedores.destroy',$proveedor->id)}}" method="POST">
                    @csrf

                    @can('admin.proveedores.edit')
                    <a href="{{ route('admin.proveedores.edit',$proveedor->id)}}" class="btn btn-info"><i
                        class="fa fa-edit"></i></a>
                    @endcan

                    @method('DELETE')
                    <button type="submit" class="btn bg-custom-red text-white"><i class="fa fa-trash"></i></button>
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