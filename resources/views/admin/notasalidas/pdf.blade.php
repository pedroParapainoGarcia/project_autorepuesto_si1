<!-- resources/views/ventas/pdf.blade.php -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de nota salida</title>
</head>

<body>
    <h1>Detalle de baja Repuesto</h1>
    <p><strong>Nro Nota :</strong> {{$notasalida->id }}</p>
    <p><strong>Fecha:</strong> {{ $notasalida->fecha}}</p>
    <p><strong>Total:</strong> {{ $notasalida->costototal }}</p>
        <!-- Aquí puedes agregar más detalles de la venta según tus necesidades -->
</body>


</html>