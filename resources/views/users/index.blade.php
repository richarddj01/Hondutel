<x-app-layout>
    <x-slot name="header">
        <div class="py-4 align-items-center text-center">
            <h2>Usuarios</h2>

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
        <div class="row align-items-center mt-5">
            <div class="col-8">
                <label>Usuarios encontrados:</label>{{count($users)}} <br>
            </div>
            <div class="col-4 gap-3 d-flex justify-content-end ">
                <a class="btn btn-success " href="/users/create">Agregar Usuario</a>

            </div>
        </div>

        <table class="table table-bordered mt-3">
            <tr>
                <th>No</th>
                <th>Nombre de Usuario</th>
                <th>Rol</th>
                <th>Correo</th>
                <th width="230px">Acción</th>
            </tr>

            @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->rol }}</td>
                <td>{{ $user->email }}</td>
                <td class="text-center ">
                    <form action="/users/{{$user->id}}" method="POST">
                        <a class="btn btn-warning " href="/users/{{$user->id}}/edit">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

</x-app-layout>