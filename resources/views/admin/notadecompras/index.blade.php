@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Nota de compra</h1>
@stop

@section('content')

@can('admin.notadecompras.create')
<div class="container-fluid">
    <a class="btn btn-primary mb-3" href="{{ route('admin.notadecompras.create')}}">+ Registrar compras</a>
    <a class="btn btn-danger mb-3" href="{{ route('admin.notadecompras.report')}}">Generar Reporte <i
            class="fas fa-file-pdf ml-2"></i></a>
    <div class="col-md-6 col-xl-12">
        <h5 style="text-align: right; margin-right: 30px; ">Fecha: {{$fechaActual}}</h5>
    </div>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> Guardado!</strong> Se registró la compra
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endcan




<div class="card">
    <div class="card-body">

        <table id="repuestos" class="table compra table-striped mt-0.5 table-bordered shadow-lg dt-responsive nowrap">

            <thead class="bg-custom-red text-white">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Costo Total</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Especificaciones</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notadecompras as $nota)
                <tr>
                    <td>{{$nota->id}}</td>
                    <td>
                        @foreach($proveedores as $proveedor)
                        @if($nota->id_proveedor == $proveedor->id)
                        <h5><span class="badge badge-dark">{{$proveedor->nombre}}</span></h5>
                        @endif
                        @endforeach
                    </td>

                    <td>{{$nota->costototal}}</td>
                    <td>{{$nota->fecha}}</td>
                    <td><a href="{{ route('admin.detallecompras.index',['id' => $nota->id]) }}" class="btn btn-info">Ver
                            detalles <i class="fas fa-eye"></i></a></td>

                    <td>
                        <form action="{{ route ('admin.notadecompras.destroy',$nota->id)}}" method="POST">
                            <a href="{{ route ('admin.notadecompras.edit',$nota->id)}}" class="btn btn-info">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn bg-custom-red text-white">Borrar</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
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
    $('#repuestos').DataTable({
        
        responsive: true,
        autoWidth: false,
        "language": {
            "lengthMenu": "Mostrar" + 
            `<select>
                <option value = '5'>5</option>
                <option value = '10'>10</option>
                <option value = '25'>25</option>
                <option value='100'>100</option>
                <option value='-1'>All</option>
                </select>` +            
            "registros por página",
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