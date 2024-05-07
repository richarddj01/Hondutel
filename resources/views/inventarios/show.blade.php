<x-app-layout>
    <x-slot name="header">

        <div class="py-4 align-items-center text-center">
            <h2>
                Inventario
            </h2>
        </div>
    </x-slot>
    <div class="container">
        <div class="card mt-4 ">
            <div class="card-header bg-info"><strong>Detalle de Producto</strong></div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>ID:</strong> {{ $producto->id }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Descripcion:</strong> {{$producto->descripcion ?? '---' }}</p>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Cantidad Disponible:</strong> {{ $producto->cantidad ?? '---' }} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

