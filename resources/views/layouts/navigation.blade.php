<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="{{ asset('resources/images/logo-gobierno-y-Hondutel2022.png') }}" alt="Logo" class="d-inline-block align-top">
        </a>

        <!-- Hamburger -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('consulta_datos_telefono') ? 'active' : '' }}" href="{{ route('consulta_datos_telefono') }}">{{ __('Consulta de Datos') }}</a>
                </li>
            </ul>

            <!-- Settings Dropdown -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Perfil') }}</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item" type="submit">{{ __('Cerrar Sesión') }}</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
