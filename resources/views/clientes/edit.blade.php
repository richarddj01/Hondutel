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
        <form action="{{ route('clientes.update', $cliente->id) }}" class="mt-3 needs-validation" method="POST" novalidate>
            @csrf
            @method('PUT')
            <!--fila-->
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        <input type="text" name="nombre" value="{{ old('nombre', $cliente->nombre) }}" class="form-control @error('nombre') is-invalid @enderror" placeholder="" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <!--fila-->
            <div class="row mt-3">
                <div class="col-12">
                    <div class="form-group">
                        <strong>Apellido:</strong>
                        <input type="text" name="apellido" value="{{ old('apellido', $cliente->apellido) }}" class="form-control @error('apellido') is-invalid @enderror" placeholder="" required>
                        @error('apellido')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <!--fila-->
            <div class="row mt-3">
                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <div class="form-group">
                        <strong>Tipo Cliente:</strong>
                        <select name="tipo_cliente_id" id="tipo_cliente_id" class="form-select @error('tipo_cliente_id') is-invalid @enderror" tabindex="3" required>
                            <option value="{{ $cliente->tipo_cliente->id }}">{{ $cliente->tipo_cliente->descripcion }}</option>
                            @foreach($tipo_cliente as $tipo)
                                <option value="{{ $tipo->id }}" {{ old('tipo_cliente_id', $cliente->tipo_cliente_id) == $tipo->id ? 'selected' : '' }}>{{ $tipo->descripcion }}</option>
                            @endforeach
                        </select>
                        @error('tipo_cliente_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <strong>Teléfono:</strong>
                        <input type="tel" name="telefono" value="{{ old('telefono', $cliente->telefono) }}" class="form-control @error('telefono') is-invalid @enderror" placeholder="">
                        @error('telefono')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <!--fila-->
            <div class="row mt-3">
                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <div class="form-group">
                        <strong>Celular:</strong>
                        <input type="tel" name="celular" value="{{ old('celular', $cliente->celular) }}" class="form-control @error('celular') is-invalid @enderror" placeholder="">
                        @error('celular')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <strong>Correo:</strong>
                        <input type="email" name="correo" value="{{ old('correo', $cliente->correo) }}" class="form-control @error('correo') is-invalid @enderror" placeholder="" required>
                        @error('correo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <!--fila-->
            <div class="row mt-3">
                <div class="col-12">
                    <div class="form-group">
                        <strong>Dirección:</strong>
                        <input type="text" name="direccion" value="{{ old('direccion', $cliente->direccion) }}" class="form-control @error('direccion') is-invalid @enderror" placeholder="" required>
                        @error('direccion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="form-group text-center">
                    <a class="btn btn-primary" href="{{ route('clientes.index') }}"> Volver</a>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
            </div>
        </form>
        <!-- Script de validación bootstrap-->
        <script src="{{ asset('js/form-validation.js') }}"></script>
    </div>
</x-app-layout>
