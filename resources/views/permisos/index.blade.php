<x-app-layout>
    <x-slot name="header">
        <div class="py-4 align-items-center text-center">
            <h2>Administracion de permisos</h2>
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
                <form action="{{ route('clientes.index') }}" method="GET">
                    <div class="input-group">
                        <input type="search" class="form-control" placeholder="Buscar..." name="search">
                        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row align-items-center mt-5">
            <div class="col-8">
                <label>Permisos encontrados:</label>{{count($permisos)}} <br>
            </div>
            <div class="col-4 gap-3 d-flex justify-content-end ">

                <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="">
                    <img src="/img/icon/llave.png" class="llaveIcon" alt="Permisos">
                    Nuevo Permiso
                </button>

                <!-- Modal Permisos -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary ">
                                <h1 class="modal-title fs-5 text-white " id="staticBackdropLabel ">Nuevo Permiso</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body mt-2 ">
                                <form action="{{route('permisos.store')}}" method="POST">
                                    @csrf
                                    <label for="Nombre" class="fw-bolder">Nombre de Permiso</label>
                                    <input type="text" name="name" placeholder="Aqui su permiso..." class="mt-1 form-control ">
                                    <button type="submit" class="btn btn-primary mt-4">Guardar</button>
                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <table class="table table-bordered mt-3">
            <tr>
                <th>No</th>
                <th>Rol</th>
                <th class="text-center ">Acción</th>
            </tr>

            @foreach ($permisos as $perm)
            <tr>
                <td>{{$perm->id}}</td>
                <td>{{$perm->name }}</td>
                <td class="justify-content-center text-center ">

                    <form action="{{route('permisos.destroy',$perm->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

</x-app-layout>