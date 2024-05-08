<x-app-layout>
    <div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Seleccione un número para asignar al cliente:</h3>
            <h3> {{ $cliente->nombre }}</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('clientes.guardar-numero', ['cliente' => $cliente->id]) }}">
                @csrf
                <div class="mb-3">
                    <label for="telefono" class="form-label">Buscar Número de Teléfono</label>
                    <input type="text" class="form-control" id="numero" name="numero" placeholder="Escribe para buscar...">
                    <input type="hidden" id="cliente_id" name="cliente_id" value="{{ $cliente->id }}">
                    <input type="hidden" id="numero_id" name="numero_id">
                </div>
                <div class="text-center">
                    <a class="btn btn-primary" href="{{route('clientes.show', $cliente->id)}}"><i class="bi bi-arrow-left-circle-fill"></i> Regresar</a>
                    <button type="submit" class="btn btn-success"> <i class="bi bi-floppy-fill"></i> Guardar</button>
                </div>
            </form>
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
