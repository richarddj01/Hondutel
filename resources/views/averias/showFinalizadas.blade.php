<x-app-layout>
    <x-slot name="header">

        <div class="py-4 align-items-center text-center">
            <h2>
                Averías
            </h2>
        </div>
    </x-slot>
    <div class="container">
        <div class="card mt-4 ">
            <div class="card-header bg-info"><strong>Detalles de Avería</strong></div>
            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        <strong>Datos Cliente</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Número:</strong> {{ $cliente['numero'] }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Dirección:</strong> {{$cliente['direccion'] ?? '---' }}</p>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Nombre:</strong> {{ $cliente['nombre'] ?? '---' }} </p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Zona:</strong>  {{  $cliente['zona'] ?? '---' }}</p>
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
                            <div class="col-6">
                                <p><strong>Fecha de Reparación:</strong> {{ $datos_averia['fecha_reparacion']->format('d/m/Y') }}</p>
                            </div>
                            <div class="col-6">
                                <p><strong>Hora de Reparación:</strong> {{ $datos_averia['fecha_reparacion']->format('h:i A') }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p><strong>Coordenadas Inicio:</strong> {{$datos_averia['ubicacion_inicio']}}</p>
                            </div>
                            <div class="col-6">
                                <p><strong>Coordenadas Finalización:</strong> {{$datos_averia['ubicacion_final']}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p><strong>Problema Presentado:</strong><br>
                            <p>{{$datos_averia['descripcion']}}</p>
                            <p><strong>Detalle:</strong></p><br>
                            <p>{{ $datos_averia['detalle_problema'] }}</p>
                            <p><strong>Reparado por:</strong></p><br>
                            <p>{{ $datos_averia['tecnicos'] }}</p>
                        </div>
                        <div class="card mt-3">
                    <div class="card-header">
                        <strong>Productos Utilizados</strong>
                    </div>
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
            </div>
            <div class="text-center mb-3">
                <a href="{{ url()->previous() }}" class="btn btn-info col-6">
                        <i class="bi bi-arrow-left"></i> Regresar
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

