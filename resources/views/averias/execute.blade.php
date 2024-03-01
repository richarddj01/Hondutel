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
                                <p><strong>Número:</strong> {{ $averia->numero }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Dirección:</strong> {{ $direccion ?? '---' }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Nombre:</strong> {{ $nombre_abonado }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Zona:</strong> {{ $zona }}</p>
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
                            <textarea readonly type="text" rows="5" name="problema_presentado" id="problema_presentado" class="form-control mt-2">{{ $averia->problema_presentado}}</textarea>         
                        </div>
                        <div class="row text-center">
                            @if($averia->iniciado != true)
                            <div class="col">
                                <form id="form_reparacion" action="{{ route('averias.update' , $averia->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="user_id_tecnico" value="{{ auth()->id() }}">
                                <input type="hidden" id="ubicacion" name="ubicacion_inicio">
                                <input type="hidden" id="iniciado" name="iniciado" value="1">
                                <input type="hidden" name="hora_inicio" value='{{date('H:i:s')}}'>  
                                <input type="hidden" name="problema_presentado" value='quesito'>  
                                <button type="button" id="btn_iniciar_reparacion" name="btn_iniciar_reparacion" onclick="iniciarReparacion()" class="btn btn-success">Iniciar Reparación</button>
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

