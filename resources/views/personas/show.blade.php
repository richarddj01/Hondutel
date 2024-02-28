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
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('personas.index') }}"> Volver</a>
                </div>
            </div>
        </div>
        <div class="row my-3 card">
            <div class="col-xs-12 col-sm-12 col-md-12 card-body">
                <div class="form-group">
                    <strong>Identidad:</strong>
                    {{ $persona->identidad }}
                    <br>
                    <strong>Nombre Completo:</strong>
                    {{ $persona->primer_nombre.' '.$persona->segundo_nombre.' '.$persona->primer_apellido.' '.$persona->segundo_apellido  }}
                    <br>
                    <strong>Telefono:</strong>
                    {{ $persona->telefono ?? '----'}}
                    <br>
                    <strong>Celular:</strong>
                    {{ $persona->celular ?? '----'}}
                    <br>
                    <strong>Correo:</strong>
                    {{ $persona->correo ?? '----'}}
                    <br>
                    <strong>Direccion:</strong>
                    {{ $persona->direccion ?? '----'}}
                    <br>
                    <br>
                    <strong>Numeros Asignados:</strong>
                    @if(count($persona->abonados) > 0)
                    <table class="table table-bordered mt-3">
                        <tr>
                            <th>#</th>
                            <th>Número</th>
                            <th>Servicio</th>
                            <th>Acción</th>
                        </tr>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($persona->abonados as $abonado)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{ $abonado->numero ?? '----'}}</td>
                            @foreach ($servicios as $tipo)
                                @if($tipo->id == $abonado->tipo_servicios_id)
                                <td>{{$tipo->descripcion}}</td>
                                @endif
                            @endforeach
                            <td><a href="{{route('consulta_datos_telefono.index', ['numero'=>$abonado->numero])}}" class="btn btn-warning">Consultar Datos</a></td>                          
                        </tr>
                        @endforeach  
                    </table>
                    @else
                        <div class="text-center mt-3">
                            <div class='alert alert-warning'>No tiene numeros asignados</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>