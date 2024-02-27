<!-- resources/views/zonas/show.blade.php -->

<x-app-layout>
    <x-slot name="header">

        <div class="py-4 align-items-center text-center">
            <h2>
                Consulta de datos técnicos
            </h2>
        </div>       
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Ver Detalles de la Zona</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('zonas.index') }}"> Volver</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Descripcion:</strong>
                    {{ $zona->descripcion }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre Corto:</strong>
                    {{ $zona->nombre_corto }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>