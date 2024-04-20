<x-app-layout>
    <x-slot name="header">
        <div class="py-4 align-items-center text-center">
            <h2>Agregar Persona</h2>
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
                                <strong>Identidad:</strong>
                                <input type="number" name="identidad" class="form-control" placeholder="" tabindex="1">
                            </div>
                        </div>
                        <!--fila-->
                        <div class="row mt-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>Primer Nombre:</strong>
                                    <input type="text" name="primer_nombre" class="form-control" placeholder="" tabindex="2">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>Telefono:</strong>
                                    <input type="tel" name="telefono" class="form-control" placeholder="" tabindex="6">
                                </div>
                            </div>
                        </div>
                        <!--fila-->
                        <div class="row mt-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>Segundo Nombre:</strong>
                                    <input type="text" name="segundo_nombre" class="form-control" placeholder="" tabindex="3">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>Celular:</strong>
                                    <input type="tel" name="celular" class="form-control" placeholder="" tabindex="7">
                                </div>
                            </div>
                        </div>
                        <!--fila-->
                        <div class="row mt-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>Primer Apellido:</strong>
                                    <input type="text" name="primer_apellido" class="form-control" placeholder="" tabindex="4">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>Correo:</strong>
                                    <input type="email" name="correo" class="form-control" placeholder="" tabindex="8">
                                </div>
                            </div>
                        </div>
                        <!--fila-->
                        <div class="row mt-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>Segundo Apellido:</strong>
                                    <input type="text" name="segundo_apellido" class="form-control" placeholder="" tabindex="5">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>Dirección:</strong>
                                    <input type="text" name="direccion" class="form-control" placeholder="" tabindex="9">
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
                                        <button type="submit" class="btn btn-success" tabindex="10">Guardar</button>
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
