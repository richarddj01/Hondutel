<x-app-layout>
    <x-slot name="header">
        <div class="py-4 align-items-center text-center">
            <h2>Averías</h2>
        </div>
    </x-slot>
    <div class="container">
        <div class="card mt-4">
            <div class="card-header bg-info"><strong>Detalles de Avería</strong></div>
            <div class="card-body">
                <!-- Información del cliente y avería omitida para brevedad -->

                <div class="card mt-3">
                    <div class="card-header"><strong>Datos Reporte Avería</strong></div>
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
                            <p><strong>Problema Presentado:</strong></p>
                            <input type="text" class="form-control" placeholder="{{ $datos_averia['descripcion'] }}" readonly>
                            <textarea readonly rows="5" name="problema_presentado" id="problema_presentado" class="form-control mt-2">{{ $datos_averia['detalle_problema'] }}</textarea>
                        </div>

                        <!-- Formulario para iniciar o finalizar reparación -->
                        <div class="row">
                            <div class="col">
                                @if($datos_averia['iniciado'] != true)
                                    <form id="form_reparacion" action="{{ route('averias.executeAverias', $datos_averia['id']) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="user_id_tecnico" value="{{ auth()->id() }}">
                                        <input type="hidden" id="ubicacion" name="ubicacion_inicio">
                                        <input type="hidden" id="iniciado" name="iniciado" value="1">
                                        <input type="hidden" name="hora_inicio" value='{{date('H:i:s')}}'>
                                        <div class="text-center">
                                            <a href="{{ route('averias.index') }}" class="btn btn-primary bi bi-arrow-left"></a>
                                            <button type="button" id="btn_iniciar_reparacion" name="btn_iniciar_reparacion" onclick="geolocalizar()" class="btn btn-success"><i class="bi bi-wrench"></i> Iniciar Reparación</button>
                                        </div>
                                    </form>
                                @else
                                    <form id="form_reparacion" action="{{ route('averias.finalizarAveria', $datos_averia['id']) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" id="ubicacion" name="ubicacion_final">
                                        <input type="hidden" name="hora_finalizado" value='{{date('H:i:s')}}'>
                                        <label>Técnicos que repararon:</label>
                                        <input type="text" id="tecnicos_encargados" name="tecnicos_encargados" class="form-control mb-3">
                                        <label>Observación:</label>
                                        <input type="text" id="observacion" name="observacion" class="form-control mb-3">

                                        <label>Productos Usados:</label>
                                        <div id="productos-usados">
                                            <div class="form-group mb-3 d-flex">
                                                <select class="form-control me-2" name="productos[]">
                                                    @foreach($productos as $producto)
                                                        <option value="{{ $producto->id }}">{{ $producto->descripcion }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="number" class="form-control" name="cantidades[]" placeholder="Cantidad" min="1">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-secondary mb-3" onclick="agregarProducto()">Agregar Producto</button>

                                        <div class="text-center">
                                            <a href="{{ route('averias.index') }}" class="btn btn-primary bi bi-arrow-left"></a>
                                            @can('Finalizar Averia')
                                                <button type="button" id="btn_finalizar_reparacion" name="btn_finalizar_reparacion" onclick="geolocalizar()" class="btn btn-success"><i class="bi bi-check2-circle"></i> Finalizar</button>
                                            @endcan
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function geolocalizar() {
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;
                    const locationInput = document.getElementById('ubicacion');
                    locationInput.value = latitude + ',' + longitude;
                    const repairForm = document.getElementById('form_reparacion');
                    repairForm.submit();
                }, function(error) {
                    alert("Error al obtener la ubicación: " + error.message);
                });
            } else {
                alert("Tu navegador no soporta la geolocalización.");
            }
        }

        function agregarProducto() {
            const container = document.getElementById('productos-usados');
            const newProduct = document.createElement('div');
            newProduct.className = 'form-group mb-3 d-flex';
            newProduct.innerHTML = `
                <select class="form-control me-2" name="productos[]">
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                    @endforeach
                </select>
                <input type="number" class="form-control" name="cantidades[]" placeholder="Cantidad" min="1">
            `;
            container.appendChild(newProduct);
        }
    </script>
</x-app-layout>
