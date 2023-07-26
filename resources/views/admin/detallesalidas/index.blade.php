@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Detalles</h1>
@stop

@section('content')

<a class="btn btn-primary mb-3" href="{{ route('admin.notasalidas.index') }}">Volver</a>
<a class="btn btn-primary mb-3" href="{{ route('admin.detallesalidas.create') }}">Agregar Repuesto</a>
{{--<a href="{{ route('admin.detallecompras.index',['id' => $nota->id]) }}" class="btn btn-info">Ver detalles</a>--}}

<div class="card">
    <div class="card-body">
        <div class="form-group row">
            <div class="col-md-4 text-center">
                <label class="form-control-label"><strong>Número Nota Salida</strong></label>
                <p>{{$id}}</p>
            </div>
            <div class="col-md-4 text-center">
                <label class="form-control-label"><strong>Vendedor</strong></label>
                <p>{{$vendedor}}</p>
            </div>
        </div>
        <table id="detallesalida" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
            <thead class="bg-custom-red text-white">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">CodigoR</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">SubTotal</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detallesalidas as $detalle)
                <tr>

                    <td>
                        @foreach($repuestos as $repuesto)
                        @if($detalle->id_repuesto == $repuesto->id)
                        @foreach ($nombres as $nombre)
                        @if ($repuesto->id_nombrerepuesto == $nombre->id)
                        <h5><span class="badge badge-dark">{{ $nombre->nombre }}</span></h5>
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                    </td>

                    <td>
                        @foreach($repuestos as $repuesto)
                        @if($detalle->id_repuesto == $repuesto->id)
                        <h5><span class="badge badge-dark">{{ $repuesto->descripcion }}</span></h5>
                        @endif
                        @endforeach
                    </td>

                    <td>{{ $detalle->codigoRepuesto }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>{{ $detalle->costounitario }}</td>
                    <td>{{ $detalle->subtotal }}</td>

                    <td>
                        <form action="{{ route('admin.detalleventas.destroy', $detalle->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn bg-custom-red text-white">Borrar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>

                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>

            </tfoot>
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
    $('#detallesalida').DataTable({
        
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
        "drawCallback": function () {
                var api = this.api();
                $(api.column(5).footer()).html(
                    'Total: ' + api.column(5, { page: 'current' }).data().reduce(function (a, b) {
                        return parseFloat(a) + parseFloat(b);
                    }, 0)
            );
        }
    });
} );
</script>

@stop