<!-- resources/views/zonas/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="py-4 align-items-center text-center">
            <h2>Consulta de datos técnicos</h2>
        </div>
    </x-slot>

    <div class="container">
        <div class="row my-5">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Crear nuevo tipo de servicio</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('servicios.index') }}"> Volver</a>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ups!</strong> Hubo un problema con tus entradas.
            </div>
        @endif
        <form action="{{ route('servicios.store') }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Descripción:</strong>
                        <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" placeholder="Descripción" value="{{ old('descripcion') }}" required>
                        @error('descripcion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Crear</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Incluye el script de validación -->
    <script src="{{ asset('js/validation.js') }}"></script>
</x-app-layout>
