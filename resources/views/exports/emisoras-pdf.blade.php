<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte de Emisoras</title>
    <style>
        body { font-family: helvetica, sans-serif; font-size: 10px; } /* Ajustado el tamaño de fuente para más espacio */
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { background-color: #f2f2f2; text-align: left; padding: 6px; border: 1px solid #ddd; }
        td { padding: 6px; border: 1px solid #ddd; vertical-align: top; } /* Alineación vertical superior para observaciones */
        .header { text-align: center; margin-bottom: 15px; }
        .filtros { margin-bottom: 15px; }
        .filtros p { margin: 3px 0; }
        .page-break { page-break-after: always; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Reporte de Emisoras</h2>
        <p>Generado el: {{ now()->format('d/m/Y H:i') }}</p>
    </div>
    
    <div class="filtros">
        <h4>Filtros aplicados:</h4>
        <p><strong>Departamento:</strong> {{ $filtros['estado'] }}</p>
        <p><strong>Municipio:</strong> {{ $filtros['municipio'] }}</p>
        <p><strong>Tipo de Emisora:</strong> {{ $filtros['tipo_emisora'] }}</p>
        {{-- NUEVO FILTRO: Emisora Activa --}}
        <p><strong>Estado de la Emisora:</strong> {{ $filtros['emisora_activa'] }}</p>
        {{-- FIN NUEVO FILTRO --}}
    </div>
    
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dial</th>
                <th>Tipo Emisora</th>
                <th>Departamento</th>
                <th>Municipio</th>
                <th>Teléfono</th>
                <th>Email</th>
                {{-- NUEVAS COLUMNAS --}}
                <th>Activa</th>
                <th>Obs. Estado</th>
                {{-- FIN NUEVAS COLUMNAS --}}
            </tr>
        </thead>
        <tbody>
            @foreach($emisoras as $emisora)
            <tr>
                <td>{{ $emisora['name'] }}</td>
                <td>{{ $emisora['dial'] }}</td>
                <td>{{ $emisora['tipo_emisora'] }}</td>
                <td>{{ $emisora['departamento'] }}</td>
                <td>{{ $emisora['municipio'] }}</td>
                <td>{{ $emisora['telefono'] }}</td>
                <td>{{ $emisora['email'] }}</td>
                {{-- NUEVAS CELDAS DE DATOS --}}
                <td>{{ $emisora['emisora_activa'] }}</td>
                <td>{{ $emisora['observacion_estado_emisora'] }}</td>
                {{-- FIN NUEVAS CELDAS DE DATOS --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
