<!-- reportes/resultados.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Resultados del Reporte
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Detalles del Reporte</h3>

                    <p><strong>Tabla Seleccionada:</strong> {{ $data['table'] }}</p>

                    <h4 class="mt-6 text-lg font-semibold mb-4">Filtros Aplicados</h4>
                    <ul>
                        @foreach ($data['filters'] as $key => $value)
                            <li><strong>{{ $key }}:</strong> {{ $value }}</li>
                        @endforeach
                    </ul>

                    <!-- Aquí podrías agregar la lógica para mostrar los resultados del reporte -->
                    <!-- Por ejemplo, una tabla con datos obtenidos según la lógica del reporte -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Columna 1</th>
                                <th>Columna 2</th>
                                <th>...</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>{{ $data }}</td>
                                    <td>...</td>
                                </tr>

                        </tbody>
                    </table>

                    <!-- Puedes adaptar esta sección para mostrar los resultados del reporte -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
