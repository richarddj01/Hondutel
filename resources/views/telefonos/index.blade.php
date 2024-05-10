<!-- resources/views/zonas/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="py-4 align-items-center text-center">
            <h2>Telefonos</h2>
            @can('Crear Telefonos')
            <a class="btn btn-success mt-3" href="{{ route('telefonos.create') }}">Agregar Datos de Teléfonos</a>
            @endcan
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
                <form action="{{ route('telefonos.index') }}" method="GET">
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
                        <th scope="col">Número</th>
                        <th scope="col">Zona</th>
                        <th scope="col">Armario</th>
                        <th scope="col" width="230px">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($telefonos as $telefono)
                    <tr>
                        <td>{{ $telefono->numero }}</td>
                        <td>{{ $telefono->zona->nombre_corto}}</td>
                        <td>{{ $telefono->armario }}</td>
                        <td>
                            <form action="{{ route('telefonos.destroy',$telefono) }}" method="POST">
                                @can('Listar Telefonos')
                                <a class="btn btn-info" href="{{ route('telefonos.show',$telefono->numero) }}"> <i class="bi-eye-fill"></i> </a>
                                @endcan

                                @can('Upd Telefonos')
                                <a class="btn btn-warning" href="{{ route('telefonos.edit',$telefono->numero) }}"> <i class="bi bi-pencil-square"></i> </a>
                                @endcan
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$telefonos->links()}}
        </div>
    </div>
</x-app-layout>