@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h3>Crear Nueva Nota de salida </h3>
<div class="col-md-6 col-xl-12 py2">
  <h5 style="text-align: right; margin-right: 30px; ">Fecha: {{ $fechaActual }}</h5>
</div>
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
    <form action="{{ route ('admin.notasalidas.store')}}" method="POST">
      @csrf
      <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-6">
            <div class="form-group">
              <label for="articulo_id">Repuesto</label>
              {{ Form::select('id_repuestos', $repuestosOptions, $detallesalida->id_repuestos, ['class'
              =>'form-control'
              . ($errors->has('id_repuestos') ? ' is-invalid' : ''), 'data-icon'=>'fas fa-procedures','placeholder'
              =>'Seleccione un repuesto']) }}
            </div>
          </div>
          <div class="form-group col-md-3">
            <div class="form-group">
              <label for="articulo_id">Codigos Repuesto</label>
              {{Form::select('codigoRepuesto',$detallesCompras,$detallesalida->codigoRepuesto,['class' =>
              'form-control'
              .($errors->has('codigoRepuesto') ? '
              is-invalid' : ''), 'placeholder'=>'Seleccione un codigo']) }}
              {!! $errors->first('codigoRepuesto', '<div class="invalid-feedback">:message</div>')!!}
            </div>
          </div>
          <div class="form-group col-md-3">
            <div class="form-group">
              <label for="precio_venta">Precio de Compra</label>
              <input type="number" class="form-control" name="costounitario" id="costounitario"
                aria-describedby="helpId" disabled>
            </div>
          </div>
          <div class="form-group col-md-3">
            <div class="form-group">
              <label for="cantidad">Cantidad</label>
              <input type="number" class="form-control" name="cantidad" id="cantidad" aria-describedby="helpId" min="0"
                max="100" oninput="validity.valid||(value='')">
            </div>
          </div>
          <div class="form-group col-md-3 mt-4">
            <div class="form-group mt-2">
              <button type="button" id="agregar" class="btn btn-info float-right" onclick="agregarArticulo()"> <i
                  class="fas fa-check"></i>
                Agregar Artículo
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
                      <th>Precio Compra (Bs)</th>
                      <th>Cantidad</th>
                      <th style="width:150px;">SubTotal (Bs)</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th colspan="5">
                        <p align="right">TOTAL PERDIDA:</p>
                      </th>
                      <th>
                        <p align="right"><span align="right" id="total_pagar_html">Bs 0.00</span>
                          <input type="hidden" name="total" id="total_pagar">
                        </p>
                      </th>
                    </tr>
                  </tfoot>
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
@stop

@section('js')

@stop