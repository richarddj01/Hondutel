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
                    <form action="{{ route('clientes.store') }}" class="mt-3 needs-validation" method="POST" novalidate>
                        @csrf
                        <!--fila-->
                        <div class="row">
                            <div class="form-group">
                                <strong>Nombre:</strong>
                                <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" placeholder="" tabindex="1" value="{{ old('nombre') }}" required>
                                @error('nombre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <strong>Apellido:</strong>
                                    <input type="text" name="apellido" class="form-control @error('apellido') is-invalid @enderror" placeholder="" tabindex="2" value="{{ old('apellido') }}" required>
                                    @error('apellido')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!--fila-->
                        <div class="row mt-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>Tipo Cliente:</strong>
                                    <select name="tipo_cliente_id" id="tipo_cliente_id" class="form-select @error('tipo_cliente_id') is-invalid @enderror" tabindex="3" required>
                                        <option value=""></option>
                                        @foreach($tipo_cliente as $tipo)
                                            <option value="{{ $tipo->id }}" {{ old('tipo_cliente_id') == $tipo->id ? 'selected' : '' }}>{{ $tipo->descripcion }}</option>
                                        @endforeach
                                    </select>
                                    @error('tipo_cliente_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>Teléfono:</strong>
                                    <input type="tel" name="telefono" placeholder="" class="form-control @error('telefono') is-invalid @enderror" tabindex="4" value="{{ old('telefono') }}">
                                    @error('telefono')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!--fila-->
                        <div class="row mt-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>Celular:</strong>
                                    <input type="tel" name="celular" class="form-control @error('celular') is-invalid @enderror" placeholder="" tabindex="5" value="{{ old('celular') }}">
                                    @error('celular')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <strong>Correo:</strong>
                                    <input type="email" name="correo" class="form-control @error('correo') is-invalid @enderror" placeholder="" tabindex="6" value="{{ old('correo') }}" required>
                                    @error('correo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <strong>Dirección:</strong>
                                    <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" placeholder="" tabindex="7" value="{{ old('direccion') }}" required>
                                    @error('direccion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-3 align-items-center">
                        </div>
                        <div class="row my-3">
                            <div class="col-6">
                                <a class="btn btn-primary" href="{{ route('clientes.index') }}"><i class="bi bi-arrow-left"></i> Volver</a>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success" tabindex="8"><i class="bi bi-floppy-fill"></i> Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Script de validación bootstrap-->
                    <script src="{{ asset('js/form-validation.js') }}"></script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
