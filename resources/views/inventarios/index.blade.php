<!-- resources/views/zonas/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="py-4 align-items-center text-center">
            <h2>Inventario</h2>
            <a class="btn btn-success mt-3" href="{{ route('inventarios.create') }}">Agregar Producto a Inventario</a>
        </div>
    </x-slot>

    <div class="container mt-3">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row mb-3">
            <div class="col">
                <form action="{{ route('inventarios.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar..." name="search">
                        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col" width="230px">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inventarios as $inventario)
                        <tr>
                            <td>{{ $inventario->id}}</td>
                            <td>{{ $inventario->descripcion}}</td>
                            <td>{{ $inventario->cantidad}}</td>
                            <td>
                                <form action="{{ route('inventarios.destroy',$inventario) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('inventarios.show',$inventario) }}">  <i class="bi-eye-fill"></i>   </a>
                                    <a class="btn btn-warning" href="{{ route('inventarios.edit',$inventario) }}"> <i class="bi bi-pencil-square"></i> </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">  <i class="bi bi-trash-fill"></i>  </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$inventarios->links()}}
        </div>
    </div>
</x-app-layout>
