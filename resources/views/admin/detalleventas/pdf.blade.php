<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detalle de la Venta</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>Detalle de la Venta</h1>
    <p>Nombre: {{$nombre}}</p>
    <p>Fecha: {{$fecha}}</p>
    <table>
        <thead>
            <tr>
                <th style="background-color: lightblue;">Nombre</th>
                <th style="background-color: lightblue;">Descripción</th>
                <th style="background-color: lightblue;">Cantidad</th>
                <th style="background-color: lightblue;">SubTotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detalleventas as $detalle)
                <tr>
                    <td>{{ $detalle->repuesto->nombrerepuesto->nombre }}</td>
                    <td>{{ $detalle->repuesto->descripcion }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>{{ $detalle->subtotal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p style="text-align: right;">Costo Total: {{ $costoTotal }}</p>
</body>
</html>