<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $title }}</title>
    <style>
        body { font-family: helvetica, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th { background-color: #f2f2f2; text-align: left; padding: 8px; }
        td { padding: 8px; border: 1px solid #ddd; }
        .header { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>{{ $title }}</h2>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($municipios as $municipio)
            <tr>
                <td>{{ $municipio['id'] }}</td>
                <td>{{ $municipio['name'] }}</td>
                <td>{{ $municipio['estado'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>