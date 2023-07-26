@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h3>Crear Nueva Nota de salida </h3>
@stop

@section('content')

<head>
  <style>
    .card {
      border: 1px solid #adb5bd;
    }
  </style>
</head>
<div class="container-fluid">
  <div class="card">
    <form action="{{ route ('admin.detallesalidas.store')}}" method="POST">
      @csrf
      <div class="card-body">
        <div class="form-row">

          <div class="form-group col-md-6">
            <div class="form-group">
              <label for="id_repuesto">Repuestos</label>
              <select class="form-control selectpicker articuloB" data-live-search="true" name="id_repuesto"
                id="id_repuesto" lang="es" autofocus>
                <option value="" disabled selected>Buscar Repuestos</option>
                @foreach($repuestosOptions as $value => $description)
                <option value="{{ $value }}">{{ $description }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group col-md-2">
            <div class="form-group">
              <label for="codigoRepuesto">Codigos Repuestos</label>
              <select class="form-control selectpicker articuloB" data-live-search="true" name="codigoRepuesto"
                id="codigoRepuesto" lang="es" autofocus>
                <option value="" disabled selected>Select. Codigos</option>
                @foreach($codigos as $value => $codigo)
                <option value="{{ $value }}">{{ $codigo }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group col-md-2">
            <div class="form-group">
              <label for="cantidad">Cantidad</label>
              <input type="number" class="form-control" name="cantidad" id="cantidad" aria-describedby="helpId" min="0"
                max="100" oninput="validity.valid||(value='')">
            </div>
          </div>


          <div class="form-group col-md-2 mt-4">
            <div class="form-group mt-2">
              <button type="button" id="agregar" class="btn btn-info float-right" onclick="agregarArticulo()">Agregar
                Repuesto</button>
            </div>
          </div>
        </div>


        <div class="card">
          <div class="card-body">
            <div class="form-group mt-4">
              <h4 class="card-title">Detalles de Baja de Repuesto</h4>
              <div class="table-responsive col-md-12  table-bordered shadow-lg">
                <table id="detalles" class="table table-striped col-md-12 table-bordered shadow-lg">
                  <thead class="bg-custom-red text-white">
                    <tr>
                      <th>Eliminar</th>
                      <th>Repuesto</th>
                      <th>Codigo Repuesto</th>
                      <th>Coantidad</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="card-footer text-muted">
          </button>
          <button type="submit" id="guardar" class="btn btn-success float-right">Registrar</button>
          <a href="{{ route('admin.notasalidas.index')}}" class="btn btn-secondary">Cancelar</a>
        </div>
      </div>

    </form>

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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>


{{-- <script>
  function agregarArticulo() {
    var repuestoId = $('#id_repuesto').val();
    var repuestoDescripcion = $('#id_repuesto option:selected').text();
    var codigoRepuesto = $('#codigoRepuesto').val();
    var cantidad = $('#cantidad').val();

    if (repuestoId && codigoRepuesto && cantidad) {
      var row = `
        <tr>
          <td><button type="button" class="btn btn-danger btn-sm" onclick="eliminarArticulo(this)">Eliminar</button></td>
          <td>${repuestoDescripcion}<input type="hidden" name="id_repuesto[]" value="${repuestoId}"></td>
          <td>${codigoRepuesto}<input type="hidden" name="codigoRepuesto[]" value="${codigoRepuesto}"></td>
          <td>${cantidad}<input type="hidden" name="cantidad[]" value="${cantidad}"></td>
        </tr>
      `;
      $('#detalles tbody').append(row);

      // Clear the input fields after adding the row
      $('#id_repuesto').val('');
      $('#codigoRepuesto').val('');
      $('#cantidad').val('');
    } else {
      // Show a warning message if any field is missing
      Swal.fire({
        icon: 'warning',
        title: 'Error',
        text: 'Por favor, seleccione un repuesto, ingrese un código y una cantidad.',
      });
    }
  }

  function eliminarArticulo(button) {
    // Remove the row from the table
    $(button).closest('tr').remove();
  }
</script>
--}}

<script>
  function agregarArticulo() {
      var repuestoId = $('#id_repuesto').val();
      var repuestoDescripcion = $('#id_repuesto option:selected').text();
      var codigoRepuesto = $('#codigoRepuesto option:selected').text();
      var cantidad = $('#cantidad').val();
  
      if (repuestoId && codigoRepuesto && cantidad) {
        var row = `
          <tr>
            <td><button type="button" class="btn btn-danger btn-sm" onclick="eliminarArticulo(this)">Eliminar</button></td>
            <td>${repuestoDescripcion}<input type="hidden" name="id_repuesto[]" value="${repuestoId}"></td>
            <td>${codigoRepuesto}<input type="hidden" name="codigoRepuesto[]" value="${codigoRepuesto}"></td>
            <td>${cantidad}<input type="hidden" name="cantidad[]" value="${cantidad}"></td>
          </tr>
        `;
        $('#detalles tbody').append(row);
  
        // Clear the input fields after adding the row
        $('#id_repuesto').val('');
        $('#codigoRepuesto').val('');
        $('#cantidad').val('');
      } else {
        // Show a warning message if any field is missing
        Swal.fire({
          icon: 'warning',
          title: 'Error',
          text: 'Por favor, seleccione un repuesto, ingrese un código y una cantidad.',
        });
      }
    }
  
    function eliminarArticulo(button) {
      // Remove the row from the table
      $(button).closest('tr').remove();
    }
</script>





@stop