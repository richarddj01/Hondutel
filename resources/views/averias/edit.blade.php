<x-app-layout>
    <x-slot name="header">
        <div class="py-4 align-items-center text-center">
            <h2>Editar Avería</h2>
        </div>  
    </x-slot>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header">Editar Avería</div>

                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <form action="{{ route('averias.edit', $averia->numero) }}" method="GET">
                                    <div class="input-group">
                                        <input type="tel" class="form-control" placeholder="Buscar..." name="search">
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
                            <form action="{{ route('averias.update', $averia->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="numero" value='{{$abonado->numero}}'>
                                <div class="card my-3">
                                    <div class="card-header">Problema presentado</div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <textarea type="text" rows="5" name="problema_presentado" id="problema_presentado" class="form-control">{{ $averia->problema_presentado }}</textarea>
                                        </div>
                                    </div>
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
