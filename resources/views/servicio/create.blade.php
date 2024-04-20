<!-- resources/views/zonas/create.blade.php -->
<x-app-layout>
    <x-slot name="header">

        <div class="py-4 align-items-center text-center">
            <h2>
                Consulta de datos técnicos
            </h2>
        </div>       
    </x-slot>

    <div class="container">
        <div class="row my-5">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Crear nuevo tipo de servicio</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('tipo_servicio.index') }}"> Volver</a>
                </div>
            </div>
        </div>
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
        <form action="{{ route('tipo_servicio.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Descripcion:</strong>
                        <input type="text" name="descripcion" class="form-control" placeholder="Descripcion">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3 mt-3">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Crear</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>