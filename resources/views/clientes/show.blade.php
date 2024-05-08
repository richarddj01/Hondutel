<!-- resources/views/zonas/show.blade.php -->

<x-app-layout>
    <x-slot name="header">

        <div class="py-4 align-items-center text-center">
            <h2>
                Consulta de Cliente
            </h2>
        </div>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb my-3">
                <div class="pull-left">
                    <h2>Detalles del Cliente</h2>
                </div>
            </div>
        </div>
        <div class="row my-3 card">
            <div class="col-xs-12 col-sm-12 col-md-12 card-body">
                <div class="form-group">
                    <strong>Nombre Completo:</strong>
                    {{ $cliente->nombre.' '.$cliente->apellido  }}
                    <br>
                    <strong>Tipo de Cliente:</strong>
                    {{ $cliente->tipo_cliente->descripcion  }}
                    <br>
                    <strong>Telefono:</strong>
                    {{ $cliente->telefono ?? '----'}}
                    <br>
                    <strong>Celular:</strong>
                    {{ $cliente->celular ?? '----'}}
                    <br>
                    <strong>Correo:</strong>
                    {{ $cliente->correo ?? '----'}}
                    <br>
                    <strong>Direccion:</strong>
                    {{ $cliente->direccion ?? '----'}}
                    <br>
                    <br>
                    <a class="btn btn-primary mb-3" style="color:white"href="{{route('clientes.agregar-numero', $cliente->id)}}"> <i class="bi bi-add"></i> Agregar Número</a>
                    <br>
                    <strong>Numeros Asignados:</strong>
                    @if(count($cliente->abonados) > 0)
                    <table class="table table-bordered mt-3">
                        <tr>
                            <th>#</th>
                            <th>Número</th>
                            <th>Servicios Contratados</th>
                            <th>Acción</th>
                        </tr>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($cliente->abonados as $abonado)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{ $abonado->numero ?? '----'}}</td>
                            <td>
                                @foreach($abonados_servicios as $servicio_contratado)
                                <!--Por cada item disponible en la tabla abonados-servicio (tabla de union) se accede
                                a la relacion con servicios para obtener la descripcion de cada servicio-->
                                <div class="btn btn-success">{{$servicio_contratado->servicio->descripcion}}</div>
                                @endforeach
                             </td>
                            <td><a href="{{route('telefonos.show', $abonado->numero)}}" class="btn btn-warning">Consultar Datos</a></td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                        <div class="text-center mt-3">
                            <div class='alert alert-warning'>No tiene numeros asignados</div>
                        </div>
                    @endif
                    <div class="text-center">
                        <a class="btn btn-primary" href="{{ route('clientes.index') }}">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
