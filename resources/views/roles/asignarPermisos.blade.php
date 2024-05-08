<x-app-layout>
    <div class="py-4 align-items-center text-center" id="titulo_roles_permisos">
        <h3>Asignar Permisos al rol: {{$rol->name}}</h3>
        <hr>
    </div>


    <div class="container mt-5">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="contenedor_Roles_Permisos">
            <p class="fw-medium fs-5 ">{{$rol->name}}</p>
            <hr>

            <form action="{{ route('roles.update', $rol->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        @php $count = 0; @endphp
                        @foreach ($permisos as $index => $permiso)
                        @if ($count == 6)
                    </div>
                    <div class="col-md-6">
                        @php $count = 0; @endphp
                        @endif
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permiso[]" value="{{ $permiso->id }}" {{ $rolePermissions && $rolePermissions->contains('id', $permiso->id) ? 'checked' : '' }}>
                            <label class="form-check-label" for="permiso{{ $permiso->id }}">{{ $permiso->name }}</label>
                        </div>
                        @php $count++; @endphp
                        @endforeach


                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Asignar Permisos</button>
                    </div>
                </div>
            </form>

        </div>




</x-app-layout>