<!DOCTYPE html>
<html>
<head>
    <title>Lista de Averías Pendientes</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 10px; text-align: left; }
        .btn { padding: 5px 10px; text-align: center; display: inline-block; }
        .btn-primary { background-color: blue; color: white; }
        .btn-warning { background-color: orange; color: white; }
        .btn-danger { background-color: red; color: white; }
        .btn-success { background-color: green; color: white; }
        .alert { padding: 15px; margin-bottom: 20px; border: 1px solid transparent; border-radius: 4px; }
        .alert-success { color: #3c763d; background-color: #dff0d8; border-color: #d6e9c6; }
    </style>
</head>
<body>
    <div class="container">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="card mt-3">
            <div class="card-header"><h1><strong>Lista de Averías Pendientes</strong></h1></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Fecha de Reporte</th>
                                <th>Hora</th>
                                <th>Número de Abonado</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach ($averias as $averia)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $averia->created_at->format('d/m/Y') }}</td>
                                <td>{{ $averia->created_at->format('h:i A') }}</td>
                                <td>{{ $averia->numero }}</td>
                                <td>
                                    @if ($averia->iniciado == 1)
                                    <span class="btn btn-success">Trabajando</span>
                                    @else
                                    <span class="btn btn-warning">Pendiente</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $averias->links() }}
                </div>
            </div>
        </div>
    </div>
</body>
</html>
