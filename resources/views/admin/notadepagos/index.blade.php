@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Nota de Ventas</h1>
@stop

@section('content')


<table id="repuestos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">

    <thead class="bg-custom-red text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Cliente</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Fecha</th>
            <th scope="col">Costo Total</th>    
            <th scope="col">Especificaciones</th>       
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
       @foreach ($notadeventas as $nota)
        <tr>
            <td>{{$nota->id}}</td> 
            <td>
                @foreach($clientes as $cliente)
                        @if($nota->id_cliente == $cliente->id)
                        <h5><span class="badge badge-dark">{{$cliente->Nombre}}</span></h5>                  
                        @endif
                @endforeach
            </td>
            <td>{{$nota->descripcion}}</td>
            <td>{{$nota->fecha}}</td>
            <td>{{$nota->costototal}}</td>
            <td><a href="{{ route('admin.detalleventas.index',['id' => $nota->id]) }}" class="btn btn-info">Ver detalles</a></td>
            
            <td>
                <form action="{{ route ('admin.notadeventas.destroy',$nota->id)}}" method="POST">
                    <a href="{{ route ('admin.notadeventas.edit',$nota->id)}}" class="btn btn-info">Editar</a>
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