<!-- resources/views/zonas/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="py-4 align-items-center text-center">
            <h2>
                Editar Datos del Cliente
            </h2>
            <p>
                {{$persona->identidad}} - {{$persona->primer_nombre.' '.$persona->segundo_nombre.' '.$persona->primer_apellido.' '.$persona->segundo_apellido}}
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
        <form action="{{ route('clientes.update',$persona->identidad) }} " class="mt-3" method="POST">
            @csrf
            @method('PUT')
            <!--fila-->
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <strong>Primer Nombre:</strong>
                        <input type="text" name="primer_nombre" value="{{ $persona->primer_nombre }}" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <strong>Telefono:</strong>
                        <input type="tel" name="telefono" value="{{ $persona->telefono }}" class="form-control" placeholder="">
                    </div>
                </div>
            </div>
            <!--fila-->
            <div class="row mt-3">
                <div class="col-6">
                    <div class="form-group">
                        <strong>Segundo Nombre:</strong>
                        <input type="text" name="segundo_nombre" value="{{ $persona->segundo_nombre }}" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <strong>Celular:</strong>
                        <input type="tel" name="celular" value="{{ $persona->celular }}" class="form-control" placeholder="">
                    </div>
                </div>
            </div>
            <!--fila-->
            <div class="row mt-3">
                <div class="col-6">
                    <div class="form-group">
                        <strong>Primer Apellido:</strong>
                        <input type="text" name="primer_apellido" value="{{ $persona->primer_apellido }}" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <strong>Correo:</strong>
                        <input type="email" name="correo" value="{{ $persona->correo }}" class="form-control" placeholder="">
                    </div>
                </div>
            </div>
            <!--fila-->
            <div class="row mt-3">
                <div class="col-6">
                    <div class="form-group">
                        <strong>Segundo Apellido:</strong>
                        <input type="text" name="segundo_apellido" value="{{ $persona->segundo_apellido }}" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <strong>Dirección:</strong>
                        <input type="text" name="direccion" value="{{ $persona->direccion }}" class="form-control" placeholder="">
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
