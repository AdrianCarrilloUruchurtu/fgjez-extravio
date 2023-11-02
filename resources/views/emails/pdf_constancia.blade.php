<!DOCTYPE html>
<html>
<head>
    <title>Constancia de Extravío</title>
</head>
<body>
    <img src="{{ asset('/storage/uploads/shield.png') }}" alt="Escudo">

    <h1>Datos personales</h1>
    <p><strong>Nombre:</strong> {{ $extraviado}}</p>
    <p><strong>CURP:</strong> {{ $curp }}</p>
    <h1>Constancia de Extravío</h1>

    <p>Yo, {{ $extraviado }} , declaro que he extraviado el siguiente objeto o documento:</p>
    <p><strong>Nombre del objeto o documento:</strong> {{ $nombreExtrav}}</p>
    <p><strong>Descripción:</strong> {{ $descripcion }}</p>
    <p><strong>Fecha del Extravío:</strong> {{ $fechaExtravio }}</p>
    <p><strong>Descripción de los hechos:</strong> {{ $descripHechos }}</p>
    <p><strong>Lugar del Extravío:</strong> {{ $lugarExtravio }}</p>

    <p>La presente constancia se emite a los fines pertinentes. Fecha: {{ $fechaActual }}</p>
</body>
</html>
