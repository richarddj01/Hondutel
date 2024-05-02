<!-- resources/views/zonas/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="py-4 align-items-center text-center">
            <h2>
                Editar Datos Técnicos Teléfono
            </h2>
        </div>
    </x-slot>

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ups!</strong> Hubo un problema con tus entradas.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!--Formulario de UPDATE-->
        <form action="{{ route('telefonos.update',$telefono->numero) }} " class="mt-3" method="POST">
            @csrf
            @method('PUT')
            <!--fila-->
            <div class="row mt-3">
                <div class="col-6">
                    <div class="form-group">
                        <strong>Zona</strong>
                        <select name="zona_id" id="zona_id" class="form-select" tabindex="3" required>
                            <option value="{{$telefono->zona->id}}">{{$telefono->zona->descripcion}} - (Actual)</option>
                            @foreach($zonas as $zona)
                            <option value="{{$zona->id}}">{{$zona->descripcion}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <strong>Armario:</strong>
                        <input type="tel" name="telefono" value="{{ $telefono->armario }}" class="form-control" placeholder="">
                    </div>
                </div>
            </div>
            <!--fila-->
            <div class="row mt-3">
                <div class="col-6">
                    <div class="form-group">
                        <strong>Par Primario:</strong>
                        <input type="number" name="par_primario" value="{{ $telefono->par_primario }}" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <strong>Par Secundario:</strong>
                        <input type="number" name="par_secundario" value="{{ $telefono->par_secundario }}" class="form-control" placeholder="">
                    </div>
                </div>
            </div>
            <!--fila-->
            <div class="row mt-3">
                <div class="col-6">
                    <div class="form-group">
                        <strong>Numero de Cable:</strong>
                        <input type="number" name="numero_de_cable" value="{{ $telefono->numero_cable }}" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <strong>Caja Terminal:</strong>
                        <input type="number" name="caja_terminal" value="{{ $telefono->caja_terminal }}" class="form-control" placeholder="">
                    </div>
                </div>
            </div>
            <!--fila-->
            <div class="row mt-3">
                <div class="col-6">
                    <div class="form-group">
                        <strong>Borne:</strong>
                        <input type="number" name="borne" value="{{ $telefono->borne }}" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <strong>Ruta:</strong>
                        <input type="text" name="ruta" value="{{ $telefono->ruta }}" class="form-control" placeholder="">
                    </div>
                </div>
            </div>
            <!--fila-->
            <div class="row mt-3">
                <div class="col-6">
                    <div class="form-group">
                        <strong>Codigo POTS:</strong>
                        <input type="number" name="codigo_pots" value="{{ $telefono->codigo_pots }}" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <strong>Codigo Puerto POTS:</strong>
                        <input type="number" name="codigo_puerto_pots" value="{{ $telefono->codigo_puerto_pots }}" class="form-control" placeholder="">
                    </div>
                </div>
            </div>
            <!--fila-->
            <div class="row mt-3">
                <div class="col-6">
                    <div class="form-group">
                        <strong>Codigo ADSL:</strong>
                        <input type="numer" name="codigo_adsl" value="{{ $telefono->codigo_adsl }}" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <strong>Codigo Puerto ADSL:</strong>
                        <input type="number" name="codigo_puerto_adsl" value="{{ $telefono->codigo_puerto_adsl }}" class="form-control" placeholder="">
                    </div>
                </div>
            </div>
            <!--fila-->
            <div class="row mt-3">
                <div class="col-6">
                    <div class="form-group">
                        <strong>Velocidad:</strong>
                        <input type="text" name="velocidad" value="{{ $telefono->velocidad }}" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <strong>IP Pública:</strong>
                        <input type="text" name="ip_publica" value="{{ $telefono->ip_publica }}" class="form-control" placeholder="">
                    </div>
                </div>
            </div>
            <!--fila-->
            <div class="row mt-3">
                <div class="col-6">
                    <div class="form-group">
                        <strong>Numero de Enlace:</strong>
                        <input type="number" name="numero_de_enlace" value="{{ $telefono->numero_de_enlace }}" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <strong>Nodo:</strong>
                        <input type="text" name="nodo" value="{{ $telefono->nodo }}" class="form-control" placeholder="">
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-6">
                    <a class="btn btn-primary" href="{{ route('telefonos.index') }}"> Volver</a>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
