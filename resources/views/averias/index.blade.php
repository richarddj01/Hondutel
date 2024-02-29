<x-app-layout>
<x-slot name="header">
    <div class="container">
        <div class="card">
            <div class="card-header">Lista de Averías</div>

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Zona</th>
                            <th>Número de Abonado</th>
                            <!-- Agregar más columnas según sea necesario -->
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($averias as $averia)
                            <tr>
                                <td>{{ $averia->id }}</td>
                                <td>{{ $averia->zona->nombre }}</td>
                                <td>{{ $averia->numero }}</td>
                                <!-- Agregar más columnas según sea necesario -->
                                <td>
                                    <a href="{{ route('averias.show', $averia->id) }}" class="btn btn-primary">Ver</a>
                                    <a href="{{ route('averias.edit', $averia->id) }}" class="btn btn-warning">Editar</a>
                                    <!-- Agregar botón de eliminar -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
