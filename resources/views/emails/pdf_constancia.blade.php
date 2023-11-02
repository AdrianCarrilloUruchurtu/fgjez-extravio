<!DOCTYPE html>
<html>
<head>
    <title>Constancia de Extravío</title>
</head>
<body>
    <h1>Constancia de Extravío</h1>

    <p>Yo, {{ $extraviado }} , declaro que he extraviado el siguiente objeto o documento:</p>
    <p><strong>Descripción:</strong> {{ $descripcion }}</p>
    <p><strong>Fecha del Extravío:</strong> {{ $fechaExtravio }}</p>
    <p><strong>Lugar del Extravío:</strong> {{ $lugarExtravio }}</p>

    <p>La presente constancia se emite a los fines pertinentes. Fecha: {{ $fechaActual }}</p>
</body>
</html>
