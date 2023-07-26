@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Inventario de Repuestos</h1>
@stop

@section('content')

@can('admin.repuestos.create')
<a class="btn btn-primary mb-3" href="{{ route('admin.repuestos.create')}}">CREAR</a>
@endcan

<table id="repuestos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">

    <thead class="bg-custom-red text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">PrecioVenta</th>
            <th scope="col">Stock</th>
            <th scope="col">Categoria</th>
            <th scope="col">Modelo</th>
            <th scope="col">Año</th>
            <th scope="col">Ubicacion</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($repuestos as $repuesto)
        <tr>
            <td>{{$repuesto->id}}</td>

            <td>
                @foreach($nombrerepuestos as $nombre)
                @if($repuesto->id_nombrerepuesto == $nombre->id)
                <h5><span class="badge badge-dark">{{$nombre->nombre}}</span></h5>
                @endif
                @endforeach
            </td>

            <td>{{$repuesto->descripcion}}</td>
            <td>{{$repuesto->precioventa}}</td>
            <td>{{$repuesto->stock}}</td>

            <td>
                @foreach($categorias as $categoria)
                @if($repuesto->id_categoria == $categoria->id)
                <h5><span class="badge badge-dark">{{$categoria->nombre}}</span></h5>
                @endif
                @endforeach
            </td>

            <td>
                @foreach($modelos as $modelo)
                @if($repuesto->id_modelo == $modelo->id)
                <h5><span class="badge badge-dark">{{$modelo->nombre}}</span></h5>
                @endif
                @endforeach
            </td>

            <td>
                @foreach($años as $año)
                @if($repuesto->id_año == $año->id)
                <h5><span class="badge badge-dark">{{$año->añofabrica}}</span></h5>
                @endif
                @endforeach
            </td>

            <td>
                @foreach($estantes as $estante)
                @if($repuesto->id_estantes == $estante->id)
                <h5><span class="badge badge-dark">{{$estante->descripcion}}</span></h5>
                @endif
                @endforeach
            </td>

            <td>
                <form action="{{ route ('admin.repuestos.destroy',$repuesto->id)}}" method="POST">
                    <a href="{{ route ('admin.repuestos.edit',$repuesto->id)}}" class="btn btn-info"><i
                            class="fa fa-edit"></i></a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn bg-custom-red text-white"><i class="fa fa-trash"></i></button>
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



<!-- SUM()  Datatables-->
<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>

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
        },
        
        
    });  

 



} ); 

</script>

@stop