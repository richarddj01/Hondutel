<x-app-layout>
    <x-slot name="header">
        <div class="container">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="card mt-3">
                <div class="card-header"><strong>Lista de Averías Pendientes</strong></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fecha de Reporte</th>
                                    <th>Hora</th>
                                    <th>Número de Abonado</th>
                                    <th width="230px">Acciones</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1
                                @endphp
                                @foreach ($averias as $averia)
                                <tr>
                                    <td>{{ $i++}}</td>
                                    <td>{{ $averia->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $averia->created_at->format('h:i A') }}</td>
                                    <td>{{ $averia->numero}}</td>
                                    <td>
                                        <!--Modal para confirmar DELETE-->
                                        <form action="{{  route('averias.destroy', $averia->id)  }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            @can('Ver Averia')
                                            <a href="{{ route('averias.show', $averia->id) }}" class="btn btn-primary"> <i class="bi-eye-fill"></i> </a>
                                            @endcan

                                            @can('Upd Averias')
                                            <a href="{{ route('averias.edit', $averia->id) }}" class="btn btn-warning"> <i class="bi bi-pencil-square"></i> </a>
                                            @endcan

                                            <!--Modal para confirmar DELETE-->
                                            @can('Del Averias')
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{$averia->id}}">
                                                <i class="bi bi-trash-fill"></i> <!-- Icono basurero DELETE-->
                                            </button>
                                            @endcan

                                            @can('Iniciar Averia')
                                            <a href="{{ route('averias.execute', $averia->id) }}" class="btn btn-success"> <i class="bi bi-tools"></i> </a>
                                            @endcan

                                            <!-- Modal -->
                                            <div class="modal fade" id="modal{{$averia->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmación</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ¿Confirma que deseas cancelar este reporte de avería?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                            <button type="submit" class="btn btn-danger"> <i class="bi bi-trash-fill"></i> Confirmar </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        @if ($averia->iniciado == 1)
                                        <a class="btn btn-success">Trabajando</a>
                                        @else
                                        <a class="btn btn-warning">Pendiente</a>
                                        @endif

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$averias->links()}}
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>