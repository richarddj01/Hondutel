<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>{{ config('app.name', 'Hondutel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{asset('/css/stilos.css')}}" rel="stylesheet">
    <link rel="icon" type='image/png' href="{{asset('/img/logo/logohondutel.png')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- JQuery -->
    <!-- Incluir jQuery -->
    <!-- Incluir jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>

    <style>
        /* Modo oscuro */
        @media (prefers-color-scheme: dark) {
            :root {
                color-scheme: dark;
            }
        }
    </style>
</head>

<body class="font-sans antialiased container-fluid ">
    <div class="row flex-nowrap">
        <nav class="col-auto px-0 colNav">
            @include('layouts.navigation')
        </nav>
        <!-- Page Heading -->

        <div class="col p-0">
            <div class="w-100 barraDetalles ">
                <a href="#" data-bs-target="#sidebar" data-bs-toggle="collapse"><i class="bi bi-list bi-lg "></i> </a>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 float-end me-5" id="Datos-Usuario">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Perfil') }}</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
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

            <div class="ps-md-2 mt-3">
                @if (isset($header))
                <header class="shadow-sm">
                    <div class="container py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
                @endif

                <!-- Page Content -->
                <main class="mt-4">
                    <div class="min-h-screen">
                        {{ $slot }}
                    </div>
                </main>
            </div>

        </div>

    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
