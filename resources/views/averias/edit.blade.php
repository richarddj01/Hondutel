<x-app-layout>
    <x-slot name="header">
        <div class="py-4 align-items-center text-center">
            <h2>Editar Avería</h2>
        </div>
    </x-slot>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header">Editar Avería</div>
                    <div class="card-body">
                        @if (isset($cliente['numero']))
                            <div class="alert alert-warning" role="alert">
                                <strong>Número de Abonado:</strong>
                                {{ $cliente['numero'] }}
                            </div>
                            <div class="card">
                                <div class="card-header">Información del Cliente</div>
                                <div class="card-body">
                                    <strong>Nombre Completo:</strong>
                                    {{ $cliente['nombre'] }}
                                    <br>
                                    <strong>Telefono:</strong>
                                    {{ $cliente['telefono'] ?? '----'}}
                                    <br>
                                    <strong>Celular:</strong>
                                    {{ $cliente['celular'] ?? '----'}}
                                    <br>
                                    <strong>Correo:</strong>
                                    {{ $cliente['correo'] ?? '----'}}
                                    <br>
                                    <strong>Direccion:</strong>
                                    {{ $cliente['direccion'] ?? '----'}}
                                    <br>
                                    <strong>Zona:</strong>
                                    {{ $cliente['zona'] ?? '----'}}
                                    <br>
                                </div>
                            </div>
                            <form action="{{ route('averias.update', $averia->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card my-3">
                                <input type="hidden" name="numero" value='{{$cliente['numero']}}'>
                                <div class="card-header">Problema presentado</div>
                                <div class="card-body">
                                    <div class="form-group">
                                    <select name="tipo_averia_id" id="tipo_averia_id" class="form-select" onchange="mostrarOtros()">
                                        <!--Validación si se seleccionó problema o eligió "otro"-->
                                        @if(isset($averia->detalle_problema))
                                            <option value="{{$averia->tipo_averia->id}}">{{$averia->detalle_problema}}</option>
                                        @else
                                            <option value=""></option>
                                        @endif
                                            @foreach ($tipo_averia as $tipo)
                                            <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <textarea type="text" rows="5" name="detalle_problema" id="detalle_problema" class="form-control mt-3">{{$averia->tipo_averia->descripcion}}</textarea>
                                </div>
                            </div>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
