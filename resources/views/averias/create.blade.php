<x-app-layout>
    <x-slot name="header">
        <div class="py-4 align-items-center text-center">
            <h2>Agregar Averia</h2>
        </div>
    </x-slot>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header">Crear Avería</div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <form action="{{ route('averias.create') }}" method="GET">
                                    <div class="input-group">
                                        <input type="tel" class="form-control" placeholder="Buscar numero..." name="search">
                                        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if (isset($abonado))
                            @if($abonado != 'no_encontrado')
                            <div class="alert alert-warning" role="alert">
                                <strong>Número de Abonado:</strong>
                                {{ $abonado->numero}}
                            </div>
                            <div class="card">
                                <div class="card-header">Información del Cliente</div>
                                <div class="card-body">
                                <div class="--bs-success-text-emphasis"></div>
                                    <strong>Nombre Completo:</strong>
                                    {{ $abonado->cliente->nombre.' '.$abonado->cliente->apellido }}
                                    <br>
                                    <strong>Telefono:</strong>
                                    {{ $abonado->cliente->telefono ?? '----'}}
                                    <br>
                                    <strong>Celular:</strong>
                                    {{ $abonado->cliente->celular ?? '----'}}
                                    <br>
                                    <strong>Correo:</strong>
                                    {{ $abonado->cliente->correo ?? '----'}}
                                    <br>
                                    <strong>Direccion:</strong>
                                    {{ $abonado->cliente->direccion ?? '----'}}
                                    <br>
                                    <strong>Zona:</strong>
                                    {{
                                        $abonado->telefono->zona->nombre_corto.' - '.$abonado->telefono->zona->descripcion ?? '----'
                                    }}
                                    <br>
                                </div>
                            </div>
                            <form action="{{ route('averias.store') }}" method="POST">
                            @csrf
                            <div class="card my-3">
                                <input type="hidden" name="numero" value='{{$abonado->numero}}'>
                                <div class="card-header">Problema presentado</div>
                                <div class="card-body">
                                    <div class="form-group">
                                    <select name="tipo_averia_id" id="tipo_averia_id" class="form-select">
                                    <!--
                                    <select name="tipo_averia_id" id="tipo_averia_id" class="form-select" onchange="mostrarOtros()">
                                    -->
                                        <option value=""></option>
                                        @foreach ($tipo_averia as $tipo)
                                        <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                                        @endforeach
                                    </select>
                                    <label for="descripcion_detallada" class="mt-3">Descripcion Detallada:</label>
                                    <textarea type="text" rows="5" name="detalle_problema" id="detalle_problema" class="form-control mt-3"></textarea>
                                    </div>
                                </div>
                                <!--
                                <script>
                                    function mostrarOtros(){
                                        var select = document.getElementById("tipo_averia_id");
                                        var txt_problema = document.getElementById("detalle_problema");
                                        if (select.value == "otro"){
                                            txt_problema.hidden = false;
                                        }else{
                                            txt_problema.hidden = true;
                                        }
                                    }
                                </script>
                                -->
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                            @else
                            <div class="alert alert-warning" role="alert">
                                No se encontró ningún abonado con ese número.
                            </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
