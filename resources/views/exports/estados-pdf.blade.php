<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte de Departamentos</title>
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
        <h2>Reporte de Departamentos</h2>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>País</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estados as $estado)
            <tr>
                <td>{{ $estado['id'] }}</td>
                <td>{{ $estado['name'] }}</td>
                <td>{{ $estado['pais'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>