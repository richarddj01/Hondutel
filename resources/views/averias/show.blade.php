<x-app-layout>
    <x-slot name="header">

        <div class="py-4 align-items-center text-center">
            <h2>
                Consulta de Cliente
            </h2>
        </div>       
    </x-slot>
    <div class="container">
        <div class="card">
            <div class="card-header">Detalles de Avería</div>

            <div class="card-body">
                <p><strong>Zona:</strong> {{ $averia->zona->nombre }}</p>
                <p><strong>Número de Abonado:</strong> {{ $averia->numero }}</p>
                <!-- Mostrar otros detalles de la avería -->
            </div>
        </div>
    </div>
</x-app-layout>

