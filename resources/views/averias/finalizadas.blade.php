<x-app-layout>
<x-slot name="header">

<div class="container">
    <h1>Averías Finalizadas</h1>

    <!-- Formulario para filtrar por rango de fechas -->
    <form method="GET" action="{{ route('averias.finalizadas') }}" class="mb-3">
        <div class="row">
            <div class="col">
                <label for="fecha_inicio" class="form-label">Fecha de inicio:</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control">
            </div>
            <div class="col">
                <label for="fecha_fin" class="form-label">Fecha de fin:</label>
                <input type="date" id="fecha_fin" name="fecha_fin" class="form-control">
            </div>
            <div class="col mt-4">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </form>

    <!-- Tabla para mostrar las averías finalizadas -->
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Fecha Reporte</th>
                <th>Hora</th>
                <th>Fecha de Finalización</th>
                <th>Hora</th>
                <th>Número</th>
                <th>Problema</th>
                <th>Reparó</th>
                <th>Observaciones</th>
                <th>Acciones</th>
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
                                    <td>{{ $averia->created_at->format('h:m A') }}</td>
                                    <td>{{ $averia->updated_at->format('d/m/Y') }}</td>
                                    <td>{{ $averia->updated_at->format('h:m A') }}</td>
                                    <td>{{ $averia->numero}}</td>
                                    <td>{{ $averia->tipo_averia->descripcion}}</td>
                                    <td>{{$averia->tecnicos_encargados}}</td>
                                    <td>{{$averia->observacion}}</td>
                                    <td>
                                        <a href="{{ route('averias.showFinalizadas', $averia->id) }}" class="btn btn-primary">   <i class="bi-eye-fill"></i>   </a>
                                    </td>
                                </tr>
                            @endforeach
        </tbody>
    </table>

    <!-- Enlaces de paginación -->
    {{ $averias->links() }}
</div>

</x-app-layout>
