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
                            <p><strong>Problema Presentado:</strong>
                            <input type="text" class="form-control" placeholder="{{ $datos_averia['descripcion'] }}" readonly>
                            <textarea readonly type="text" rows="5" name="problema_presentado" id="problema_presentado" class="form-control mt-2">{{ $datos_averia['detalle_problema'] }}</textarea>
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

