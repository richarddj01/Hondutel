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
                        <strong>Datos Abonado</strong>
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
                                <p><strong>Nombre:</strong> {{ $cliente['nombre'] }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Zona:</strong> {{ $cliente['zona'] }}</p>
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
                                <p><strong>Hora de Reporte:</strong> {{ $datos_averia['fecha_reporte']->format('h:m A') }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p><strong>Problema Presentado:</strong>
                            <input type="text" class="form-control" placeholder="{{ $datos_averia['descripcion'] }}" readonly>
                            <textarea readonly type="text" rows="5" name="problema_presentado" id="problema_presentado" class="form-control mt-2">{{ $datos_averia['detalle_problema']}}</textarea>
                        </div>
                        <div class="row">
                            @if($datos_averia['iniciado'] != true)
                            <div class="col">
                                <form id="form_reparacion" action="{{ route('averias.executeAverias', $datos_averia['id']) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="user_id_tecnico" value="{{ auth()->id() }}">
                                <input type="hidden" id="ubicacion" name="ubicacion_inicio">
                                <input type="hidden" id="iniciado" name="iniciado" value="1">
                                <input type="hidden" name="hora_inicio" value='{{date('H:i:s')}}'>
                                <div class="text-center">
                                    <button type="button" id="btn_iniciar_reparacion" name="btn_iniciar_reparacion" onclick="iniciarReparacion()" class="btn btn-success">Iniciar Reparación</button>
                                </div>
                                </div>
                                </form>
                            </div>
                            @else
                            <div class="col">
                                <form id="form_reparacion" action="{{ route('averias.finalizarAveria' , $datos_averia['id']) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="ubicacion" name="ubicacion_final">
                                <input type="hidden" name="hora_finalizado" value='{{date('H:i:s')}}'>
                                <label>Tecnicos que repararon: </label>
                                <input type="text" id="Q" name="tecnicos_encargados" class="form form-control mb-3">
                                <label>Observación: </label>
                                <input type="text" id="observacion" name="observacion" class="form form-control mb-3">
                                <div class="text-center">
                                    <button type="button" id="btn_iniciar_reparacion" name="btn_iniciar_reparacion" onclick="iniciarReparacion()" class="btn btn-success">Finalizar</button>
                                </div>
                                </div>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function iniciarReparacion() {
        // Verificar si el navegador del usuario soporta la geolocalización
        if ("geolocation" in navigator) {
            // Obtener la ubicación del usuario
            navigator.geolocation.getCurrentPosition(function (position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                // Llenar los campos ocultos con la ubicación
                const locationInput = document.getElementById('ubicacion');
                locationInput.value = latitude + ',' + longitude;

                // Enviar el formulario
                const repairForm = document.getElementById('form_reparacion');
                repairForm.submit();
            }, function (error) {
                alert("Error al obtener la ubicación: " + error.message);
            });
        } else {
            alert("Tu navegador no soporta la geolocalización.");
        }
    }
    </script>
</x-app-layout>

