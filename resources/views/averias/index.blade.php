<x-app-layout>
<x-slot name="header">
    <div class="container">
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
                                    <td>{{ $averia->numero}}</td>
                                    <td>
                                        <a href="{{ route('averias.show', $averia->id) }}" class="btn btn-primary">   <i class="bi-eye-fill"></i>   </a>
                                        <a href="{{ route('averias.edit', $averia->id) }}" class="btn btn-warning">  <i class="bi bi-pencil-square"></i>  </a>
                                        <a href="{{ route('averias.execute', $averia->id) }}" class="btn btn-success">  <i class="bi bi-trash-fill"></i>  </a>
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
