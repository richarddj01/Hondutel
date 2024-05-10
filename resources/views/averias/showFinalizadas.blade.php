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
                            <p><strong>Problema Presentado:</strong><br>
                            <p>{{$datos_averia['descripcion']}}</p>
                            <p><strong>Detalle:</strong></p><br>
                            <p>{{ $datos_averia['detalle_problema'] }}</p>
                            <p><strong>Reparado por:</strong></p><br>
                            <p>{{ $datos_averia['tecnicos'] }}</p>
                        </div>

                        <gmp-map center="40.731,-73.997" zoom="8" map-id="DEMO_MAP_ID">
      <div id="floating-panel" slot="control-block-start-inline-center">
        <input id="latlng" type="text" value="{{$datos_averia['ubicacion_inicio']}},{{$datos_averia['ubicacion_final']}}"/>
        <input id="submit" type="button" value="Reverse Geocode"/>
      </div>
      <gmp-advanced-marker></gmp-advanced-marker>
    </gmp-map>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=INSERT_YOUR_API_KEY&callback=initMap&libraries=marker&v=beta&solution_channel=GMP_CCS_reversegeocoding_v2"
      defer
    ></script>
                        <div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
                        <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div>
                        <script>(function () {
                        var setting = {"width":800,"height":600,"satellite":false,"zoom":12,"placeId":"ChIJ-XK4gzuRY48Rg_QfPNWb42o","cid":"0x6ae39bd53c1ff483","coords":[{{$datos_averia['ubicacion_inicio']}},{{$datos_averia['ubicacion_final']}}],"centerCoord":[{{$datos_averia['ubicacion_inicio']}},{{$datos_averia['ubicacion_final']}}],"id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"1107483"};
                        var d = document;
                        var s = d.createElement('script');
                        s.src = 'https://1map.com/js/script-for-user.js?embed_id=1107483';
                        s.async = true;
                        s.onload = function (e) {
                        window.OneMap.initMap(setting)
                        };
                        var to = d.getElementsByTagName('script')[0];
                        to.parentNode.insertBefore(s, to);
                        })();</script><a href="https://1map.com/es/map-embed">1 Map</a></div>
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

