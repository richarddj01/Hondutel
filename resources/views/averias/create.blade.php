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
                                        <input type="search" class="form-control" placeholder="Buscar..." name="search">
                                        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if (isset($abonado))
                        @if($abonado != 'no_encontrado')
                        <div class="card">
                            <div class="card-header">Información del Cliente</div>
                            <div class="card-body">
                                <strong>Identidad:</strong>
                                {{ $abonado->identidad }}
                                <br>
                                <strong>Nombre Completo:</strong>
                                {{ $abonado->nombre_completo  }}
                                <br>
                                <strong>Telefono:</strong>
                                {{ $abonado->telefono ?? '----'}}
                                <br>
                                <strong>Celular:</strong>
                                {{ $abonado->celular ?? '----'}}
                                <br>
                                <strong>Correo:</strong>
                                {{ $abonado->correo ?? '----'}}
                                <br>
                                <strong>Direccion:</strong>
                                {{ $abonado->direccion ?? '----'}}
                                <br>
                            </div>
                        </div>
                        @else
                        <div class="alert alert-warning" role="alert">
                            No se encontró ningún abonado con ese número.
                        </div>
                        @endif
                        @endif
                        <form action="{{ route('averias.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="zona_id">Zona:</label>
                                <select name="zona_id" id="zona_id" class="form-control">
                                    {{$zonas}}
                                    @foreach ($zonas as $zona)
                                        <option value="{{ $zona->id }}">{{ $zona->nombre_corto.' - '.$zona->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="numero">Número de Abonado:</label>
                                <input type="number" name="numero" id="numero" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="pronlema_presentado">Problema Presentado:</label>
                                <input type="text" name="pronlema_presentado" id="pronlema_presentado" class="form-control">
                            </div>
                            <!-- Resto de los campos -->
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

