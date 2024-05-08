<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar Número a Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>Seleccione un número para asignar al cliente {{ $cliente->nombre }}</h3>

                    <form method="POST" action="{{ route('clientes.guardar-numero', ['cliente' => $cliente->id]) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Buscar Número de Teléfono</label>
                            <input type="text" class="form-control" id="numero" name="numero" placeholder="Escribe para buscar...">
                            <input type="hidden" id="cliente_id" name="cliente_id" value="{{$cliente->id}}">
                            <input type="hidden" id="numero_id" name="numero_id">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Configurar autocompletado para el campo de búsqueda de teléfonos
        $(function() {
            $('#numero').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "{{ route('buscar-numeros') }}",
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                minLength: 2,
                select: function(event, ui) {
                    $('#numero').val(ui.item.label);
                    $('#numero_id').val(ui.item.value);
                    return false;
                }
            });
        });
    </script>
</x-app-layout>
