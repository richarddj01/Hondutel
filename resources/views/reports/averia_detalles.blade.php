<!DOCTYPE html>
<html>
<head>
    <title>Detalles de Avería</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 100%; margin: 0 auto; }
        .card { border: 1px solid #ddd; margin-top: 20px; padding: 15px; }
        .card-header { background-color: #f7f7f7; padding: 10px; font-weight: bold; }
        .card-body { padding: 10px; }
        .row { display: flex; flex-wrap: wrap; }
        .col-md-6, .col-6 { width: 50%; padding: 10px; }
        .text-center { text-align: center; }
        .mt-3 { margin-top: 20px; }
        .mt-4 { margin-top: 40px; }
        .btn { padding: 10px 20px; text-align: center; display: inline-block; }
        .btn-info { background-color: #17a2b8; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <div class="py-4 align-items-center text-center">
            <h2>Averías</h2>
        </div>
                <div class="card mt-4">
                    <div class="card-header">
                        <strong>Datos Cliente</strong>
                    </div>
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
                <div class="card mt-3">
                    <div class="card-header">
                        <strong>Datos Reporte Avería</strong>
                    </div>
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
                            <p><strong>Problema Presentado:</strong>
                               {{ $datos_averia['descripcion'] }} <br><br>
                               {{$datos_averia['detalle_problema'] }}
                            </p>
                        </div>
                    </div>
        </div>
    </div>
</body>
</html>
