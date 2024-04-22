<x-app-layout>
    <x-slot name="header">
        <div class="py-4 align-items-center text-center">
            <h2>Agregar Cliente</h2>
        </div>
    </x-slot>

    <div class="container mt-3 shadow-sm">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="p-3 bg-white border-b border-gray-200">
                    <form action="{{ route('clientes.store') }}" class="mt-3" method="POST">
                        @csrf
                        <!--fila-->
                        <div class="row">
                            <div class="form-group">
                                <strong>Nombre:</strong>
                                <input type="text" name="nombre" class="form-control" placeholder="" tabindex="1">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <strong>Apellido:</strong>
                                    <input type="text" name="apellido" class="form-control" placeholder="" tabindex="2">
                                </div>
                            </div>
                        </div>
                        <!--fila-->
                        <div class="row mt-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>Tipo Cliente:</strong>
                                    <select name="tipo_cliente_id" id="tipo_cliente_id" class="form-select" tabindex="3" required>
                                        <option value=""></option>
                                        @foreach($tipo_cliente as $tipo)
                                        <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>Telefono:</strong>
                                    <input type="tel" name="telefono" placeholder="" class="form-control" tabindex="4">
                                </div>
                            </div>
                        </div>
                        <!--fila-->
                        <div class="row mt-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>Celular:</strong>
                                    <input type="tel" name="celular" class="form-control" placeholder="" tabindex="5">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>Correo:</strong>
                                    <input type="email" name="correo" class="form-control" placeholder="" tabindex="6">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <strong>Dirección:</strong>
                                    <input type="text" name="direccion" class="form-control" placeholder="" tabindex="7">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-3 align-items-center">
                            </div>
                            <div class="row my-3">
                                <div class="col-6">
                                    <a class="btn btn-primary" href="{{ route('clientes.index') }}"> Volver</a>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success" tabindex="8">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
