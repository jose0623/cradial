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
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Emisora</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fiestas as $index => $fiesta)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $fiesta['nombre'] }}</td>
                <td>{{ $fiesta['fecha'] }}</td>
                <td>{{ $fiesta['emisora'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>