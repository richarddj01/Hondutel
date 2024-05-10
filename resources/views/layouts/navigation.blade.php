<div id="sidebar" class="collapse collapse-horizontal  border-end">
    <div id="sidebar-nav" class="list-group  border-0 rounded-0 text-sm-start min-vh-100 pt-3 ">

        <!-- Logo -->
        <a class="" href="{{ route('dashboard.index') }}">
            <img src="{{ asset('/img/logo/logoHondutel2022.png') }}" alt="Logo" class="img-fluid ">
        </a>
        <br>

        <!-- NavClientes -->
        @can('Modulo Clientes')
        <a href="{{ route('clientes.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="bi bi-people-fill"></i> <span>Clientes</span> </a>
        <hr>
        @endcan

        <!-- NavZonas -->
        @can('Modulo Zonas')
        <a href="{{ route('zonas.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="bi bi-map-fill"></i> <span>Zonas</span></a>
        <hr>
        @endcan

        <!-- NavServicios -->
        @can('Modulo Servicios')
        <a href="{{ route('servicios.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="bi bi-pass-fill"></i> <span>Servicios</span></a>
        <hr>
        @endcan

        <!-- NavDatosTecnicos -->
        @can('Modulo Datos Tecnicos')
        <a href="{{ route('consulta_datos_telefono.index') }}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="bi bi-bricks"></i> <span>Datos Tecnicos</span></a>
        <hr>
        @endcan

        <!-- NavAverias -->
        @can('Modulo Averias')
        <div class="dropdown w-100">
            <a class="list-group-item border-end-0 d-inline-block text-truncate dropdown-toggle w-100 " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bi bi-exclamation-triangle-fill"></i> <span>Averias</span>
            </a>

            <div class="dropdown-menu mx-3" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="{{ route('averias.index') }}">Pendientes</a>
                <a class="dropdown-item" href="{{ route('averias.create') }}">Registrar</a>
            </div>
        </div>
        <hr>
        @endcan

        <!-- NavTelefonos -->
        @can('Modulo Telefonos')
        <a href="{{route('telefonos.index')}}" class="list-group-item border-end-0 d-inline-block text-truncate item-below-dropdown" data-bs-parent="#sidebar"><i class="bi bi-telephone-fill"></i> <span>Telefonos</span></a>
        <hr>
        @endcan

        <!-- NavInventario -->
        @can('Modulo Inventario')
        <a href="{{route('inventarios.index')}}" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="bi bi-calendar"></i> <span>Inventario</span></a>
        <hr>
        @endcan

        <!-- NavAdministracion -->
        @can('Modulo Administracion')
        <div class="dropdown ">
            <a class="list-group-item border-end-0 d-inline-block text-truncate dropdown-toggle w-100 " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bi bi-gear"></i> <span>Administracion</span>
            </a>

            <div class="dropdown-menu mx-3" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="/users">Usuarios</a>
                <a class="dropdown-item" href="{{ route('roles.index') }}">Roles</a>
                <a class="dropdown-item" href="{{ route('permisos.index') }}">Permisos</a>
            </div>
        </div>
        <hr>
        @endcan

    </div>
</div>

<script>
    const navContenedor = document.getElementById('sidebar');

    function getScreenResolution() {
        let screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

        console.log(screenWidth);

        if (screenWidth >= 720) {
            navContenedor.classList.add('show');
        } else {
            navContenedor.classList.remove('show');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        getScreenResolution();
        window.addEventListener('resize', getScreenResolution);
    });

    document.addEventListener('DOMContentLoaded', function() {
        let dropdown = document.querySelector('.dropdown');

        dropdown.addEventListener('shown.bs.dropdown', function() {
            let dropdownMenu = this.querySelector('.dropdown-menu');
            let dropdownHeight = dropdownMenu.offsetHeight;
            let itemBelowDropdown = document.querySelector('.item-below-dropdown');
            itemBelowDropdown.style.marginTop = dropdownHeight + 'px';
        });

        dropdown.addEventListener('hidden.bs.dropdown', function() {
            let itemBelowDropdown = document.querySelector('.item-below-dropdown');
            itemBelowDropdown.style.marginTop = '0';
        });
    });
</script>