<!-- resources/views/reportes/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Generador de Reportes
        </h2>
    </x-slot>

    <div class="container py-8">
        <form method="post" action="{{ route('reportes.generate') }}" id="reportForm">
            @csrf
            <div class="mb-4">
                <label for="table">Selecciona una tabla:</label>
                <select name="table" id="table" class="form-select">
                    @foreach ($tables as $tableName)
                        <option value="{{ $tableName }}">{{ $tableName }}</option>
                    @endforeach
                </select>
            </div>
            <div id="filterFields" class="mb-4">
                <!-- Aquí se cargarán dinámicamente los campos de filtro -->
            </div>
            <button type="submit" class="btn btn-primary">Generar Reporte</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tableSelect = document.getElementById('table');
            const filterFieldsContainer = document.getElementById('filterFields');

            tableSelect.addEventListener('change', function() {
                const selectedTable = tableSelect.value;

                fetch(`/get-columns/${selectedTable}`)
                    .then(response => response.json())
                    .then(data => {
                        filterFieldsContainer.innerHTML = '';

                        data.forEach(column => {
                            const label = document.createElement('label');
                            label.textContent = `Filtro por ${column}:`;

                            const input = document.createElement('input');
                            input.type = 'text';
                            input.name = 'filters[]';
                            input.placeholder = `Ingrese un valor para ${column}`;

                            filterFieldsContainer.appendChild(label);
                            filterFieldsContainer.appendChild(input);
                        });
                    })
                    .catch(error => console.error('Error al obtener las columnas:', error));
            });
        });
    </script>
</x-app-layout>
