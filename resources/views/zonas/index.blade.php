<x-app-layout>
    <x-slot name="header">
        <div class="row py-4 align-items-center text-center">
            <div class="col">
                <h2>Zonas</h2>
                @can('Crear Zonas')
                <a class="btn btn-success" href="{{ route('zonas.create') }}"> Crear nueva Zona</a>
                @endcan
            </div>
        </div>
    </x-slot>

    <div class="container mt-5">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="row mb-3">
            <div class="col">
                <form action="{{ route('zonas.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar..." name="search">
                        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Descripcion</th>
                    <th>Nombre Corto</th>
                    <th>Identificador</th>
                    <th width="280px">Acción</th>
                </tr>
                @php
                $i = 0;
                @endphp
                @foreach ($zonas as $zona)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $zona->descripcion }}</td>
                    <td>{{ $zona->nombre_corto }}</td>
                    <td>{{ $zona->id }}</td>
                    <td>
                        <form action="{{ route('zonas.destroy',$zona->id) }}" method="POST">
                            @can('Ver Zona')
                            <a class="btn btn-info" href="{{ route('zonas.show',$zona->id) }}"> <i class="bi-eye-fill"></i> </a>
                            @endcan
                            @can('Upd Zonas')
                            <a class="btn btn-warning" href="{{ route('zonas.edit',$zona->id) }}"> <i class="bi bi-pencil-square"></i> </a>
                            @endcan
                            @csrf
                            @method('DELETE')

                            <!--Modal para confirmar DELETE-->
                            @can('Del Zonas')
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$zona->id}}">
                                <i class="bi bi-trash-fill"></i> <!-- Icono basurero DELETE-->
                            </button>
                            @endcan

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$zona->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmación</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Confirma que deseas eliminar la zona "{{$zona->descripcion}}"
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-danger"> <i class="bi bi-trash-fill"></i> Eliminar </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            {{$zonas->links()}}
        </div>
    </div>
</x-app-layout>
