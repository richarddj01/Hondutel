<?php
$action = isset($user) ? true : false;
$title = $action ? 'Editar Usuario' : 'Agregar Usuario';

?>

<x-app-layout>
    <x-slot name="header">
        <div class="py-4 align-items-center text-center">
            <h2>{{$title}}</h2>
        </div>
    </x-slot>

    <div class="container mt-3 shadow-sm">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="p-3 bg-white border-b border-gray-200">
                    <form action="{{$action?'/users/'.$user->id:'/users'}}" class="mt-3" method="POST">
                        @csrf
                        <!--fila-->
                        @if($action)
                        @method('PUT')
                        <div class="row">
                            <div class="form-group">
                                <strong>Id:</strong>
                                <input type="text" name="id" class="form-control" value="{{$action?$user->id:''}}" readonly placeholder="" tabindex="1">
                            </div>
                        </div>
                        @endif
                        <div class="row mt-3">
                            <div class="form-group">
                                <strong>Nombre:</strong>
                                <input type="text" name="name" class="form-control" value="{{$action?$user->name:''}}" placeholder="" tabindex="1">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <strong>Rol de Usuario:</strong>
                                    <select name="rol" id="" class="form-select" tabindex="2">
                                        <option value="">Seleccione un rol</option>
                                        @foreach($roles as $rol)
                                        <option value="{{ $rol->name }}" {{$action? $rolesUser && $rolesUser->name == $rol->name ? 'selected' : '' :''}}>
                                            {{ $rol->name == 'Atencion_al_Cliente' ? 'Atencion al Cliente' : $rol->name }}
                                        </option>
                                        @endforeach
                                    </select>


                                </div>
                            </div>
                        </div>
                        <!--fila-->
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <strong>Email :</strong>
                                    <input type="email" name="email" class="form-control" {{ $action ? 'readonly' : '' }} placeholder="ejemplo@gmail.com" value="{{$action?$user->email:''}}" tabindex="3">
                                </div>
                            </div>

                            <div class="col-12 my-3">
                                <div class="form-group">
                                    <strong>{{$action?'Nueva Contraseña: ':'Contraseña: '}}</strong>
                                    <input type="password" name="password" class="form-control" placeholder="" tabindex="4">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 mt-3 align-items-center">
                            </div>
                            <div class="row my-3 justify-content-center text-center">
                                <div class="col-6">
                                    <a class="btn btn-primary w-50 " href="/users">Volver</a>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success w-50 " tabindex="8">Guardar</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>