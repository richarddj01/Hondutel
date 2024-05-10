<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight py-3">
            Escritorio
        </h2>
    </x-slot>

    <div class="cointainer mx-md-5 shadow pt-3">
        <div class="row px-4">
            <div class="col-12 col-md-6">
                <div class="card mb-3">
                    <div class="row px-3">
                        <div class="col-3 rounded-start-3  align-content-center text-center colorAzulOscuro">
                            <img src="{{asset('img/icon/personas.png')}}" class="w-50" alt="...">
                        </div>
                        <div class="col-9  bg-primary rounded-end-3 ">
                            <div class="card-body">
                                <h5 class="text-white ">Clientes</h5>
                                <h3 class="text-white ">{{$clientes}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="card mb-3 ">
                    <div class="row px-3">
                        <div class="col-3 rounded-start-3  align-content-center text-center colorgrisOscuro">
                            <img src="{{asset('img/icon/mapa.png')}}" class="w-50" alt="...">
                        </div>
                        <div class="col-9 bg-secondary rounded-end-3 ">
                            <div class="card-body">
                                <h5 class="text-white ">Zonas</h5>
                                <h3 class="text-white ">{{$zonas}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row px-4">
            <div class="col-12 col-md-6">
                <div class="card mb-3">
                    <div class="row px-3">
                        <div class="col-3 rounded-start-3  align-content-center text-center colorverdeOscuro">
                            <img src="{{asset('img/icon/ajustes.png')}}" class="w-50" alt="...">
                        </div>
                        <div class="col-9  bg-success rounded-end-3 ">
                            <div class="card-body">
                                <h5 class="text-white ">Servicios</h5>
                                <h3 class="text-white ">{{$servicios}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="card mb-3 ">
                    <div class="row px-3">
                        <div class="col-3 rounded-start-3  align-content-center text-center colorRosaOscuro">
                            <img src="{{asset('img/icon/tecnico.png')}}" class="w-50" alt="...">
                        </div>
                        <div class="col-9 bg-danger rounded-end-3 ">
                            <div class="card-body">
                                <h5 class="text-white ">Datos Técnicos</h5>
                                <h3 class="text-white ">{{$telefonos}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row px-4">
            <div class="col-12 col-md-6">
                <div class="card mb-3 ">
                    <div class="row px-3">
                        <div class="col-3 rounded-start-3  align-content-center text-center coloramarilloOscuro">
                            <img src="{{asset('img/icon/averias.png')}}" class="w-50" alt="...">
                        </div>
                        <div class="col-9 bg-warning rounded-end-3 ">
                            <div class="card-body">
                                <h5 class="text-white ">Averias</h5>
                                <h3 class="text-white ">{{$averias}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="card mb-3 ">
                    <div class="row px-3">
                        <div class="col-3 rounded-start-3  align-content-center text-center usuarioIcon">
                            <img src="{{asset('img/icon/usuariosIcon.png')}}" class="w-50" alt="...">
                        </div>
                        <div class="col-9 usuarioColor rounded-end-3 ">
                            <div class="card-body">
                                <h5 class="text-white ">Usuarios</h5>
                                <h3 class="text-white ">{{$users}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


</x-app-layout>