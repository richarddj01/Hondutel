<!-- resources/views/zonas/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="py-4 align-items-center text-center">
            <h2>Servicios</h2>
            <a class="btn btn-success mt-3" href="{{ route('tipo_servicio.create') }}">Agregar Servicio</a>
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
                <form action="{{ route('tipo_servicio.index') }}" method="GET">
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
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($tipo_servicio as $servicio)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $servicio->descripcion }}</td>
                            <td>{{ $servicio->id }}</td>
                            <td>
                                <form action="{{ route('tipo_servicio.destroy',$servicio->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('tipo_servicio.show',$servicio->id) }}">Ver</a>
                                    <a class="btn btn-warning" href="{{ route('tipo_servicio.edit',$servicio->id) }}">Editar</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
