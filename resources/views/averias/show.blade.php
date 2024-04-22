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
                                <p><strong>Número:</strong> {{ $abonado->numero }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Dirección:</strong> {{ $abonado->cliente->direccion ?? '---' }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Nombre:</strong> {{ $abonado->cliente->nombre.' '.$abonado->cliente->apellido ?? '---' }} </p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Zona:</strong>  {{ $telefono->zona->nombre_corto.' - '.$telefono->zona->descripcion ?? '---' }}</p>
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
                            <p><strong>Avería registrada por:</strong> {{ $averia->user->name }}</p>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p><strong>Fecha de Reporte:</strong> {{ $averia->created_at->format('d/m/Y') }}</p>
                            </div>
                            <div class="col-6">
                                <p><strong>Hora de Reporte:</strong> {{ $averia->created_at->format('h:m A') }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p><strong>Problema Presentado:</strong>
                            <textarea readonly type="text" rows="5" name="problema_presentado" id="problema_presentado" class="form-control mt-2">{{ $averia->tipo_averia->descripcion.$averia->detalle_problema}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

