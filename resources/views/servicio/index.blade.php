<!-- resources/views/zonas/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="py-4 align-items-center text-center">
            <h2>Servicios</h2>
            <a class="btn btn-success mt-3" href="{{ route('servicios.create') }}">Agregar Servicio</a>
        </div>
    </x-slot>

    <div class="container mt-3">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row mb-3">
            <div class="col">
                <form action="{{ route('servicios.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar..." name="search">
                        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Codigo</th>
                        <th scope="col" width="230px">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($servicios as $servicio)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $servicio->descripcion }}</td>
                            <td>{{ $servicio->id }}</td>
                            <td>
                                <form action="{{ route('servicios.destroy',$servicio->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('servicios.show',$servicio->id) }}">  <i class="bi-eye-fill"></i>   </a>
                                    <a class="btn btn-warning" href="{{ route('servicios.edit',$servicio->id) }}"> <i class="bi bi-pencil-square"></i> </a>
                                    @csrf
                                    @method('DELETE')

                                    <!--Modal para confirmar DELETE-->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{$servicio->id}}">
                                    <i class="bi bi-trash-fill"></i> <!-- Icono basurero DELETE-->
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal{{$servicio->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmación</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Confirma que deseas eliminar el servicio "{{$servicio->descripcion}}"
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-danger">  <i class="bi bi-trash-fill"></i> Eliminar </button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$servicios->links()}}
        </div>
    </div>
</x-app-layout>
