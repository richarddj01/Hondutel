<x-app-layout>
<x-slot name="header">
        <div class="row py-4 align-items-center text-center dark:text-white">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Listado de Personas</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('personas.create') }}"> Agregar</a>
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
                <form action="{{ route('personas.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar..." name="search">
                        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                    </div>
                </form>
            </div>
        </div>


        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Identidad</th>
                <th>Nombre Completo</th>
                <th width="280px">Acción</th>
            </tr>
            @php
                $i = 0;
            @endphp
            @foreach ($personas as $persona)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $persona->identidad }}</td>
                    <td>{{ $persona->primer_nombre.' '.$persona->segundo_nombre.' '.$persona->primer_apellido.' '.$persona->segundo_apellido  }}</td>
                    <td>
                        <form action="{{ route('personas.destroy',$persona->identidad) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('personas.show',$persona->identidad) }}">Ver</a>
                            <a class="btn btn-warning" href="{{ route('personas.edit',$persona->identidad) }}">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

</x-app-layout>
