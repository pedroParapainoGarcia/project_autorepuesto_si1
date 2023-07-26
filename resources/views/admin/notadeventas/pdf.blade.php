<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Notas de Venta</title>
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
    <h1>Notas de Venta</h1>
    <table>
        <thead>
            <tr>
                <th style="background-color: lightblue;">Usuario</th>
                <th style="background-color: lightblue;">Cliente</th>
                <th style="background-color: lightblue;">Fecha</th>
                <th style="background-color: lightblue;">Costo Total</th>
                <th style="background-color: lightblue;">Descripción</th>         
            </tr>
        </thead>
        <tbody>
            @php
                $totalVentas = 0;
            @endphp
            @foreach ($notasalida as $nota)
                @php
                    $totalVentas += $nota->costototal;
                @endphp
                <tr>
                    <td>{{ $nota->usuarios->name }}</td>                    
                    <td>{{ $nota->fecha }}</td>
                    <td>{{ $nota->costototal }}</td>
                    <td>{{ $nota->descripcion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p style="text-align: right;"> Total: {{ $totalVentas }}</p>
</body>
</html>