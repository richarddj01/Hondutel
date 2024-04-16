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
<<<<<<< HEAD
                                        <input type="tel" class="form-control" placeholder="Buscar numero..." name="search">
=======
                                        <input type="tel" class="form-control" placeholder="Buscar..." name="search">
>>>>>>> origin/main
                                        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if (isset($abonado))
                            @if($abonado != 'no_encontrado')
                            <div class="alert alert-warning" role="alert">
                                <strong>Número de Abonado:</strong>
                                {{ $abonado->numero }}
                            </div>
                            <div class="card">
                                <div class="card-header">Información del Cliente</div>
                                <div class="card-body">
                                <div class="--bs-success-text-emphasis"></div>
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
                                    <strong>Zona:</strong>
                                    {{ $abonado->zonas->zona->nombre_corto.' - '.$abonado->zonas->zona->descripcion ?? '----'}}
                                    <br>
                                </div>
                            </div>
                            <form action="{{ route('averias.store') }}" method="POST">
                            @csrf
                            <div class="card my-3">
<<<<<<< HEAD
                                <input type="hidden" name="numero" value='{{$abonado->numero}}'>
=======
>>>>>>> origin/main
                                <div class="card-header">Problema presentado</div>
                                <div class="card-body">
                                    <div class="form-group">
                                    <textarea type="text" rows="5" name="problema_presentado" id="problema_presentado" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
<<<<<<< HEAD
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
=======
                            <!-- Resto de los campos -->
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
>>>>>>> origin/main
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
