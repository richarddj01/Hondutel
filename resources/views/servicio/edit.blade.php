<!-- resources/views/zonas/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="py-4 align-items-center text-center">
            <h2>Servicios</h2>
        </div>
    </x-slot>

    <div class="container">
        <div class="row my-5">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Editar Servicios</h2>
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Ups!</strong> Hubo un problema con tus entradas.
                </div>
            @endif
            <form action="{{ route('servicios.update', $servicio->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            <input type="text" name="descripcion" value="{{ $servicio->descripcion }}" class="form-control @error('descripcion') is-invalid @enderror" placeholder="Descripcion" required>
                            @error('descripcion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                        <div class="form-group text-center">
                            <a class="btn btn-primary" href="{{ route('servicios.index') }}"> Volver</a>
                            <button type="submit" class="btn btn-success">Actualizar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Incluye el script de validación -->
    <script src="{{ asset('js/validation.js') }}"></script>
</x-app-layout>
