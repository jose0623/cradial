<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $title }}</title>
    <style>
        body { font-family: helvetica, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background-color: #f2f2f2; text-align: left; padding: 8px; font-weight: bold; }
        td { padding: 8px; border: 1px solid #ddd; }
        .header { text-align: center; margin-bottom: 20px; }
        .title { font-size: 18px; font-weight: bold; }
        .subtitle { font-size: 14px; color: #555; }
        .dias { display: flex; justify-content: space-between; margin-top: 5px; }
        .dia { width: 30px; height: 30px; border-radius: 50%; background: #eee; display: flex; align-items: center; justify-content: center; font-weight: bold; }
        .dia.active { background: #4CAF50; color: white; }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">{{ $title }}</div>
        <div class="subtitle">Generado el: {{ now()->format('d/m/Y H:i') }}</div>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Programa</th>
                <th>Tipo</th>
                <th>Días</th>
                <th>Horario</th>
                <th>Locutor</th>
                <th>Activo</th>
                <th>Costo</th>
                <th>Venta</th>
            </tr>
        </thead>
        <tbody>
            @foreach($programas as $index => $programa)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $programa['nombre'] }}</td>
                <td>{{ $programa['tipo'] }}</td>
                <td>{{ $programa['dias'] }}</td>
                <td>{{ $programa['horario'] }}</td>
                <td>{{ $programa['locutor'] }}</td>
                <td>{{ $programa['activo'] }}</td>
                <td>{{ $programa['costo'] }}</td>
                <td>{{ $programa['venta'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>