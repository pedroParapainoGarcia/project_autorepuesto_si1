@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Listado de Nombres de Repuestos</h1>
@stop

@section('content')
{{-- <a href="{{ route('admin.nombrerepuestos.create')}}" class="btn btn-primary mb-3">CREAR</a> --}}
@can('admin.nombrerepuestos.create')
    <a class="btn btn-primary mb-3" href="{{ route('admin.nombrerepuestos.create')}}">CREAR</a>
@endcan


<table id="nombrerepuestos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
   
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($nombrerepuestos as $nombre)
        <tr>
            <td>{{$nombre->id}}</td>
            <td>{{$nombre->nombre}}</td>
            <td>
                <form action="{{ route ('admin.nombrerepuestos.destroy',$nombre->id)}}" method="POST">
                    <a href="{{ route ('admin.nombrerepuestos.edit',$nombre->id)}}" class="btn btn-info">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
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
    $('#nombrerepuestos').DataTable({
        //"lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
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