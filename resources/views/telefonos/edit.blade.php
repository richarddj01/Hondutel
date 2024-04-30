<!-- resources/views/zonas/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="py-4 align-items-center text-center">
            <h2>
                Editar Datos del Cliente
            </h2>
            <p>
                {{$cliente->nombre.' '.$cliente->apellido.' '}}
            </p>
        </div>
    </x-slot>

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ups!</strong> Hubo un problema con tus entradas.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!--Formulario de UPDATE-->
        <form action="{{ route('clientes.update',$cliente->id) }} " class="mt-3" method="POST">
            @csrf
            @method('PUT')
            <!--fila-->
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        <input type="text" name="nombre" value="{{ $cliente->nombre }}" class="form-control" placeholder="">
                    </div>
                </div>
            </div>
            <!--fila-->
            <div class="row mt-3">
                <div class="col-12">
                    <div class="form-group">
                        <strong>Apellido:</strong>
                        <input type="text" name="apellido" value="{{ $cliente->apellido }}" class="form-control" placeholder="">
                    </div>
                </div>
            </div>
            <!--fila-->
            <div class="row mt-3">
                <div class="col-6">
                    <div class="form-group">
                        <strong>Tipo Cliente:</strong>
                        <select name="tipo_cliente_id" id="tipo_cliente_id" class="form-select" tabindex="3" required>
                            <option value="{{$cliente->tipo_cliente->id}}">{{$cliente->tipo_cliente->descripcion}}</option>
                            @foreach($tipo_cliente as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <strong>Telefono:</strong>
                        <input type="tel" name="telefono" value="{{ $cliente->telefono }}" class="form-control" placeholder="">
                    </div>
                </div>
            </div>
            <!--fila-->
            <div class="row mt-3">
                <div class="col-6">
                    <div class="form-group">
                        <strong>Celular:</strong>
                        <input type="tel" name="celular" value="{{ $cliente->celular }}" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <strong>Correo:</strong>
                        <input type="email" name="correo" value="{{ $cliente->correo }}" class="form-control" placeholder="">
                    </div>
                </div>
            </div>
            <!--fila-->
            <div class="row mt-3">
                <div class="col-12">
                    <div class="form-group">
                        <strong>Dirección:</strong>
                        <input type="text" name="direccion" value="{{ $cliente->direccion }}" class="form-control" placeholder="">
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-6">
                    <a class="btn btn-primary" href="{{ route('clientes.index') }}"> Volver</a>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
