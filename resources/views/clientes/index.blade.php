<x-app-layout>
<x-slot name="header">
        <div class="row py-4 align-items-center text-center dark:text-white">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Listado de Clientes</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('clientes.create') }}"> Agregar</a>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="container mt-5">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row mb-3">
            <div class="col">
                <form action="{{ route('clientes.index') }}" method="GET">
                    <div class="input-group">
                        <input type="search" class="form-control" placeholder="Buscar..." name="search">
                        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
        <label>Clientes encontrados: </label>{{$clientes->count()}} <br>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nombre del Cliente</th>
                <th>Tipo Cliente</th>
                <th width="230px">Acción</th>
            </tr>
            @php
                $i = 0;
            @endphp
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $cliente->nombre.' '.$cliente->apellido }}</td>
                    <td>{{ $cliente->tipo_cliente->descripcion }}</td>
                    <td>
                        <form action="{{ route('clientes.destroy',$cliente->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('clientes.show',$cliente->id) }}">Ver</a>
                            <a class="btn btn-warning" href="{{ route('clientes.edit',$cliente->id) }}">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{$clientes->links()}}
    </div>

</x-app-layout>
