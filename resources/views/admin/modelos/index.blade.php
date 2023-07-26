@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Listado de Modelos</h1>
@stop

@section('content')

@can('admin.modelos.create')
    <a class="btn btn-primary mb-3" href="{{ route('admin.modelos.create')}}">CREAR</a>
@endcan

<table id="modelos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">

    <thead class="bg-custom-red text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Modelo</th>
            <th scope="col">Marca</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($modelos as $modelo)
        <tr>
            <td>{{$modelo->id}}</td>
            <td>{{$modelo->nombre}}</td>

            <td>
                @foreach($marcas as $marca)
                    @if($modelo->id_marca == $marca->id)
                        {{--
                        <td class="p-3 text-center">{{$marca->nombre}}</td> --}}
                        <h5><span class="badge badge-dark">{{$marca->nombre}}</span></h5>
                    @endif

                  @endforeach
            </td>

            <td>
                <form action="{{ route ('admin.modelos.destroy',$modelo->id)}}" method="POST">
                    <a href="{{ route ('admin.modelos.edit',$modelo->id)}}" class="btn btn-info">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn bg-custom-red text-white">Borrar</button>
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
    $('#modelos').DataTable({
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