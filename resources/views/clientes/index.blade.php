<x-app-layout>
<x-slot name="header">
        <div class="row py-4 align-items-center text-center dark:text-white">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Listado de Clientes</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('clientes.create') }}"><i class="bi bi-plus-circle-fill"></i> Agregar</a>
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
                        <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i> Buscar</button>
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
                            <a class="btn btn-info" href="{{ route('clientes.show',$cliente->id) }}">   <i class="bi-eye-fill"></i>   </a>
                            <a class="btn btn-warning" href="{{ route('clientes.edit',$cliente->id) }}">  <i class="bi bi-pencil-square"></i>  </a>
                            @csrf
                            @method('DELETE')

                            <!--Modal para confirmar DELETE-->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{$cliente->id}}">
                            <i class="bi bi-trash-fill"></i> <!-- Icono basurero DELETE-->
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modal{{$cliente->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmación</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Confirma que deseas eliminar a {{$cliente->nombre}}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-danger">  <i class="bi bi-trash-fill"></i> Confirmar </button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{$clientes->links()}}
    </div>

</x-app-layout>
