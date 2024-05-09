<x-app-layout>
    <div class="container mt-5">
        <div class="text-center">
            <h3>Cliente: {{ $cliente->nombre }}</h3>
        </div>
    <div class="card">
        <div class="card-header">
            <h4>Servicios contratados para este número:</h4>
        </div>
        <div class="card-body">
            <a href="{{route('clientes.serviciosCreate', ['cliente' => $cliente, 'abonado'=> $abonado])}}" class="btn btn-success"> <i class="bi bi-plus-circle-fill"></i> Agregar</a>
            <table class="table table-bordered mt-3">
                <tr>
                    <th>#</th>
                    <th>Servicio Contratado</th>
                </tr>
                @php
                    $i = 1;
                @endphp
                @foreach($abonados_servicios as $servicios_contratados)
                <tr>
                    <td>{{$i++}}</td>
                    <td>
                        {{$servicios_contratados->servicio->descripcion}}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="text-center mb-3">
            <a href="{{route('clientes.show', $cliente->id)}}" class="btn btn-primary col-3 col-md-2"> <i class="bi bi-arrow-left"></i> Volver</a>
        </div>
    </div>
</div>
</x-app-layout>
