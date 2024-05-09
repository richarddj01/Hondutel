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
                    <td>
                    <form action="{{ route('clientes.serviciosDelete', ['abonados_servicio_id'=>$servicios_contratados->id, 'cliente' => $cliente, 'abonado'=> $abonado]) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <!--Modal para confirmar DELETE-->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{$servicios_contratados->id}}">
                            <i class="bi bi-trash-fill"></i> <!-- Icono basurero DELETE-->
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modal{{$servicios_contratados->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmación</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Confirma que deseas eliminar
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-danger">  <i class="bi bi-trash-fill"></i> Confirmar </button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </form>
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
