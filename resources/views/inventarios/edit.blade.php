<!-- resources/views/zonas/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">

        <div class="py-4 align-items-center text-center">
            <h2>
                Inventarios
            </h2>
        </div>
    </x-slot>

    <div class="container">
        <div class="row my-5">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Editar Producto</h2>
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
        <form action="{{ route('inventarios.update',$producto->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Descripcion:</strong>
                        <input type="text" name="descripcion" value="{{ $producto->descripcion }}" class="form-control" placeholder="Descripcion">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group">
                        <strong>Cantidad a agregar:</strong>
                        <input type="number" class="form-control" name="cantidad" value="{{ $producto->cantidad }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                    <div class="form-group text-center">
                        <a class="btn btn-primary" href="{{ route('inventarios.index') }}"> Volver</a>
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </div>
                </div>
            </div>
        </form>



    </div>
</x-app-layout>
