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
                    <a class="btn btn-primary mb-3" style="color:white"href="{{route('clientes.agregar-numero', $cliente->id)}}"> <i class="bi bi-plus-circle-fill"></i> Agregar Número</a>
                    <br>
                    <strong>Numeros Asignados:</strong>
                    @if(count($cliente->abonados) > 0)
                    <table class="table table-bordered mt-3">
                        <tr>
                            <th>#</th>
                            <th>Número</th>
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
                                <a class="btn btn-success" href="{{ route('clientes.servicios', ['cliente' => $cliente, 'abonado' => $abonado->id]) }}"> <i class="bi bi-eye-fill"></i> Ver Servicios</a>
                                <a href="{{route('telefonos.show', $abonado->numero)}}" class="btn btn-warning"> <i class="bi bi-table"></i> Consultar Datos</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                        <div class="text-center mt-3">
                            <div class='alert alert-warning'>No tiene numeros asignados</div>
                        </div>
                    @endif
                    <div class="text-center">
                        <a class="btn btn-primary" href="{{ route('clientes.index') }}"> <i class="bi bi-arrow-left"></i> Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
