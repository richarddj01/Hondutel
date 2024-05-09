<x-app-layout>
    <div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Seleccione un número para asignar al cliente:</h3>
            <h3> {{ $cliente->nombre }}</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('clientes.serviciosStore', ['cliente' => $cliente->id, 'abonado' => $abonado]) }}">
                @csrf
                <div class="form-group mb-3">
                    <select name="servicio_id" id="servicio_id" class="form-select">
                        <option value=""></option>
                        @foreach ($servicios as $servicio)
                        <option value="{{$servicio->id}}">{{$servicio->descripcion}}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="abonado_id" value="{{$abonado}}">
                </div>
                <div class="text-center">
                    <a class="btn btn-primary" href="{{route('clientes.servicios',['cliente' => $cliente->id, 'abonado' => $abonado] )}}"><i class="bi bi-arrow-left-circle-fill"></i> Regresar</a>
                    <button type="submit" class="btn btn-success"> <i class="bi bi-floppy-fill"></i> Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
</x-app-layout>
