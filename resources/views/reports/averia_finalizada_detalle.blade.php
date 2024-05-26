<!-- resources/views/averias/pdf.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Avería</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 100%; margin: 0 auto; }
        .header, .footer { text-align: center; margin: 20px 0; }
        .card { border: 1px solid #ccc; border-radius: 5px; padding: 15px; margin-bottom: 20px; }
        .card-header { font-weight: bold; background-color: #f7f7f7; padding: 10px; border-bottom: 1px solid #ccc; }
        .card-body { padding: 10px; }
        .row { display: flex; }
        .col-md-6 { width: 50%; padding: 5px; }
        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td { border: 1px solid #ccc; padding: 10px; text-align: left; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Detalles de Avería</h2>
        </div>
        <div class="card">
            <div class="card-header">Datos Cliente</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Número:</strong> {{ $cliente['numero'] }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Dirección:</strong> {{ $cliente['direccion'] ?? '---' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Nombre:</strong> {{ $cliente['nombre'] ?? '---' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Zona:</strong> {{ $cliente['zona'] ?? '---' }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Datos Reporte Avería</div>
            <div class="card-body">
                <div class="row">
                    <p><strong>Avería registrada por:</strong> {{ $datos_averia['usuario_reporte'] }}</p>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p><strong>Fecha de Reporte:</strong> {{ $datos_averia['fecha_reporte']->format('d/m/Y') }}</p>
                    </div>
                    <div class="col-6">
                        <p><strong>Hora de Reporte:</strong> {{ $datos_averia['fecha_reporte']->format('h:i A') }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p><strong>Fecha de Reparación:</strong> {{ $datos_averia['fecha_reparacion']->format('d/m/Y') }}</p>
                    </div>
                    <div class="col-6">
                        <p><strong>Hora de Reparación:</strong> {{ $datos_averia['fecha_reparacion']->format('h:i A') }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p><strong>Coordenadas Inicio:</strong> {{ $datos_averia['ubicacion_inicio'] }}</p>
                    </div>
                    <div class="col-6">
                        <p><strong>Coordenadas Finalización:</strong> {{ $datos_averia['ubicacion_final'] }}</p>
                    </div>
                </div>
                <div class="row">
                    <p><strong>Problema Presentado:</strong><br>
                    <p>{{ $datos_averia['descripcion'] }}</p>
                    <p><strong>Detalle:</strong><br>
                    <p>{{ $datos_averia['detalle_problema'] }}</p>
                    <p><strong>Reparado por:</strong><br>
                    <p>{{ $datos_averia['tecnicos'] }}</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Productos Utilizados</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos_utilizados as $producto)
                                <tr>
                                    <td>{{ $producto->descripcion }}</td>
                                    <td>{{ $producto->pivot->cantidad }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <a href="{{ url()->previous() }}" class="btn btn-info">
                <i class="bi bi-arrow-left"></i> Regresar
            </a>
        </div>
    </div>
</body>
</html>
